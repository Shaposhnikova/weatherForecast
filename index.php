<?php
require_once 'config/main.php';
require_once 'config/autoload.php';

$rawWeatherData = (new \WeatherForecast\WeatherData())->get5daysForecast('Stockholm');
$weatherDB = new \WeatherForecast\WeatherDB();
$weatherData = (new \WeatherForecast\WeatherParser($rawWeatherData))->getData();
$newWeatherData = $weatherDB->filterData($weatherData);
$weatherDB->insertWeather($newWeatherData);
(new \WeatherForecast\WeatherSender())->sendMail();

