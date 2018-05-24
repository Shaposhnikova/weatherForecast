<?php

namespace WeatherForecast;

/**
 * Class WeatherSender
 * @package WeatherForecast
 */
class WeatherSender
{

    public function wasMailSent()
    {
        $savedDates = $this->readDatesFromFile();
        $date = $this->getCurrentDate();
        if (in_array($date, $savedDates)) {
            return true;
        } else {
            return false;
        }
    }

    public function sendMailToCustomer()
    {
        $to = "alex.shaposhnikovaa@gmail.com";
        $subject = "Weather";
        $msg = "Bring the umbrella!";
        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Your name <alex.shaposhnikovaa@gmail.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        mail($to, $subject, $msg, $headers);

        $this->saveDateToFile();
    }

    public function IsRainyToday()
    {
        $weatherDB = new \WeatherForecast\WeatherDB();
        if ($weatherDB->isRainyToday()) {
            return true;
        } else{
            return false;
        }
    }

    public function sendMail(){
        $isRainyToday = $this->IsRainyToday();
        $wasMailSent = $this->wasMailSent();

        if($isRainyToday AND !$wasMailSent){
            $this->sendMailToCustomer();
        }
    }

    public function saveDateToFile()
    {
        $date = $this->getCurrentDate();

        if (file_exists(SAVED_DATES_FILE)) {
            $date = ";" . $date;
        }
        $fp = fopen(SAVED_DATES_FILE, "a");
        fwrite($fp, $date);
        fclose($fp);
    }

    private function getCurrentDate()
    {
        return date("Y-m-d");
    }

    public function readDatesFromFile()
    {
        $dates = array();
        if (file_exists(SAVED_DATES_FILE)) {
            $dates = file_get_contents(SAVED_DATES_FILE);
            $dates = explode(";", $dates);
        }

        return $dates;
    }
}