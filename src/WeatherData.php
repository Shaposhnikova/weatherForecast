<?php

namespace WeatherForecast;

class WeatherData
{

    /**
     * Get forecast for 5 days by city name
     *
     * @param string $city
     * @return mixed
     */
    public function get5daysForecast($city)
    {
        $url = WEATHER_API_URL . "/forecast?q={$city}&" . WEATHER_API_KEY;
        return $this->getJSONContent($url);
    }

    /**
     * Get content
     *
     * @param $url
     * @param bool $asArray
     * @return mixed
     */
    private function getJSONContent($url, $asArray = false)
    {
        $content = json_decode(file_get_contents($url), $asArray);
        return $content;
    }
}