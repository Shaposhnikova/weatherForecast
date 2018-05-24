<?php

namespace WeatherForecast;

/**
 * Class WeatherObject
 * @package WeatherForecast
 */
class WeatherObject
{
    /**
     * @var
     */
    private $tempMin;
    /**
     * @var
     */
    private $tempMax;
    /**
     * @var
     */
    private $tempPressure;
    /**
     * @var
     */
    private $tempHumidity;
    /**
     * @var
     */
    private $weatherCondition;
    /**
     * @var
     */
    private $description;
    /**
     * @var
     */
    private $windSpeed;
    /**
     * @var
     */
    private $dateAndTime;
    /**
     * @var
     */
    private $date;


    /**
     * @return mixed
     */
    public function getTempMin()
    {
        return $this->tempMin;
    }

    /**
     * @param $tempMin
     * @return $this
     */
    public function setTempMin($tempMin)
    {
        $this->tempMin = $tempMin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTempMax()
    {
        return $this->tempMax;
    }

    /**
     * @param $tempMax
     * @return $this
     */
    public function setTempMax($tempMax)
    {
        $this->tempMax = $tempMax;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTempPressure()
    {
        return $this->tempPressure;
    }

    /**
     * @param $tempPressure
     * @return $this
     */
    public function setTempPressure($tempPressure)
    {
        $this->tempPressure = $tempPressure;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTempHumidity()
    {
        return $this->tempHumidity;
    }

    /**
     * @param $tempHumidity
     * @return $this
     */
    public function setTempHumidity($tempHumidity)
    {
        $this->tempHumidity = $tempHumidity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWeatherCondition()
    {
        return $this->weatherCondition;
    }

    /**
     * @param $weatherCondition
     * @return $this
     */
    public function setWeatherCondition($weatherCondition)
    {
        $this->weatherCondition = $weatherCondition;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWindSpeed()
    {
        return $this->windSpeed;
    }

    /**
     * @param $windSpeed
     * @return $this
     */
    public function setWindSpeed($windSpeed)
    {
        $this->windSpeed = $windSpeed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateAndTime()
    {
        return $this->dateAndTime;
    }

    /**
     * @param $dateAndTime
     * @return $this
     */
    public function setDateAndTime($dateAndTime)
    {
        $this->dateAndTime = $dateAndTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
}