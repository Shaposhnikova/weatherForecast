<?php
/**
 * Created by PhpStorm.
 * User: Sani4ka
 * Date: 9/29/2017
 * Time: 9:16 PM
 */

include 'WeatherData.php';
include 'WeatherDB.php';

$url = "http://api.openweathermap.org/data/2.5/forecast?id=2673730&APPID=4af630cd34205ce74507ae6e25f8483e";

$contents = file_get_contents($url);
$clima = json_decode($contents);
$list = $clima->list;

$weatherArray = array();

foreach ($list as $dailyWeather) {
    $tempMin = $dailyWeather->main->temp_min;
    $tempMax = $dailyWeather->main->temp_max;
    $tempPressure = $dailyWeather->main->pressure;
    $tempHumidity = $dailyWeather->main->humidity;
    $weatherCondition = $dailyWeather->weather[0]->main;
    $description = $dailyWeather->weather[0]->description;
    $windSpeed = $dailyWeather->wind->speed;
    $date = $dailyWeather->dt_txt;

    $weatherData = new WeatherData($tempMin, $tempMax, $tempPressure, $tempHumidity, $weatherCondition, $description, $windSpeed, $date);
    $weatherArray[] = $weatherData;
}

$insert = null;

$weatherDB = new WeatherDB();

if($weatherDB->createTable()) {
    $insert = $weatherDB->connect()->prepare('INSERT INTO weather (tempMin, tempMax, tempPressure, tempHumidity, weatherCondition, description, windSpeed, date) VALUES (:tempMin, :tempMax, :tempPressure, :tempHumidity, :weatherCondition, :description, :windSpeed, :date)');
    foreach ($weatherArray as $weatherData) {
        $insert->bindValue(':tempMin', $weatherData->getTempMin());
        $insert->bindValue(':tempMax', $weatherData->getTempMax());
        $insert->bindValue(':tempPressure', $weatherData->getTempPressure());
        $insert->bindValue(':tempHumidity', $weatherData->getTempHumidity());
        $insert->bindValue(':weatherCondition', $weatherData->getWeatherCondition());
        $insert->bindValue(':description', $weatherData->getDescription());
        $insert->bindValue(':windSpeed', $weatherData->getWindSpeed());
        $insert->bindValue(':date', $weatherData->getDate());
        $insert->execute();
    }
}

//$sql = "INSERT INTO weather (tempMin, tempMax, tempPressure, tempHumidity, weatherCondition, description, windSpeed, date)
//    VALUES ('John', 'Doe', 'john@example.com')";
//// use exec() because no results are returned
//$conn->exec($sql);
//echo "New record created successfully";