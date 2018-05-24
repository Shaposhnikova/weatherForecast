<?php

namespace WeatherForecast;

class WeatherDB
{
    private $connection;

    public function __construct()
    {
        $this->connection = DbConnector::getInstance()->getConnection();
    }

    public function insertWeather($weatherData)
    {
        if (empty($weatherData)) {
            return;
        }

        $insert = $this->connection->prepare('
              INSERT INTO weather
                (tempMin, tempMax, tempPressure, tempHumidity, weatherCondition, description, windSpeed, fullDate, date)
                VALUES
                (:tempMin, :tempMax, :tempPressure, :tempHumidity, :weatherCondition, :description, :windSpeed, :dateAndTime, :date)'
        );
        /**
         * @var $data WeatherObject
         */

        foreach ($weatherData as $data) {
            $insert->bindValue(':tempMin', $data->getTempMin());
            $insert->bindValue(':tempMax', $data->getTempMax());
            $insert->bindValue(':tempPressure', $data->getTempPressure());
            $insert->bindValue(':tempHumidity', $data->getTempHumidity());
            $insert->bindValue(':weatherCondition', $data->getWeatherCondition());
            $insert->bindValue(':description', $data->getDescription());
            $insert->bindValue(':windSpeed', $data->getWindSpeed());
            $insert->bindValue(':dateAndTime', $data->getDateAndTime());
            $insert->bindValue(':date', $data->getDate());
            $insert->execute();
        }
    }

    public function filterData($weatherData)
    {
        $allDates = $this->getAllDates();

        if (empty($allDates)) {
            return $weatherData;
        }

        $newWeatherData = array();
        foreach ($weatherData as $weatherObject) {
            $date = $weatherObject->getDate();
            if (!in_array($date, $allDates)) {
                $newWeatherData[] = $weatherObject;
            }
        }

        return $newWeatherData;
    }

    public function getAllDates()
    {
        $sql = 'SELECT date FROM weather';
        $select = $this->connection->query($sql);
        $allDates = $select->fetchAll(\PDO::FETCH_COLUMN);

        return $allDates;
    }

    public function isRainyToday()
    {
        $currentDate = date("Y-m-d");

        $select = $this->connection->prepare('SELECT * FROM weather WHERE date = ?');
        $select->execute(array($currentDate));
        $weatherObjects = $select->fetchAll();

        foreach ($weatherObjects as $weatherObject){
           if($weatherObject["weatherCondition"] == "Rain"){
                return true;
            }
        }
        return false;
    }
}