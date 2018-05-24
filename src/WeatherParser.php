<?php
namespace WeatherForecast;

/**
 * Class WeatherParser
 * @package WeatherForecast
 */
class WeatherParser
{
    private $rawData;
    private $data;

    /**
     * WeatherParser constructor.
     * @param $weatherData
     */
    public function __construct($weatherData)
    {
        $this->rawData = $weatherData;
    }

    private function parseData()
    {
        $list = $this->rawData->list;
        $weatherArray = [];
        foreach ($list as $dailyWeather) {
            $weatherObject = new WeatherObject();
            $weatherObject->setTempMin($dailyWeather->main->temp_min)
                ->setTempMax($dailyWeather->main->temp_max)
                ->setTempPressure($dailyWeather->main->pressure)
                ->setTempHumidity($dailyWeather->main->humidity)
                ->setWeatherCondition($dailyWeather->weather[0]->main)
                ->setDescription($dailyWeather->weather[0]->description)
                ->setWindSpeed($dailyWeather->wind->speed)
                ->setDateAndTime($dailyWeather->dt_txt)
                ->setDate(substr($dailyWeather->dt_txt,0,10));
            $weatherArray[] = $weatherObject;
        }
        $this->data = $weatherArray;
    }

    /**
     * Return weather array with objects inside
     * @return array
     */
    public function getData()
    {
        $this->parseData();
        return $this->data;
    }
}