<?php
class WeatherData
{
    private $tempMin;
    private $tempMax;
    private $tempPressure;
    private $tempHumidity;
    private $weatherCondition;
    private $description;
    private $windSpeed;
    private $date;

    public function __construct($tempMin, $tempMax, $tempPressure, $tempHumidity, $weatherCondition, $description, $windSpeed,$date)
    {
        $this->tempMin = $tempMin;
        $this->tempMax = $tempMax;
        $this->tempPressure = $tempPressure;
        $this->tempHumidity = $tempHumidity;
        $this->weatherCondition = $weatherCondition;
        $this->description = $description;
        $this->windSpeed = $windSpeed;
        $this->date = $date;
    }


    public function getTempMin()
    {
        return $this->tempMin;
    }

    public function setTempMin($tempMin)
    {
        $this->tempMin = $tempMin;
    }

    public function getTempMax()
    {
        return $this->tempMax;
    }

    public function setTempMax($tempMax)
    {
        $this->tempMax = $tempMax;
    }

    public function getTempPressure()
    {
        return $this->tempPressure;
    }

    public function setTempPressure($tempPressure)
    {
        $this->tempPressure = $tempPressure;
    }

    public function getTempHumidity()
    {
        return $this->tempHumidity;
    }

    public function setTempHumidity($tempHumidity)
    {
        $this->tempHumidity = $tempHumidity;
    }

    public function getWeatherCondition()
    {
        return $this->weatherCondition;
    }

    public function setWeatherCondition($weatherCondition)
    {
        $this->weatherCondition = $weatherCondition;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getWindSpeed()
    {
        return $this->windSpeed;
    }

    public function setWindSpeed($windSpeed)
    {
        $this->windSpeed = $windSpeed;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}