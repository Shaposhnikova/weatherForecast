<?php
/**
 * Created by PhpStorm.
 * User: Sani4ka
 * Date: 9/29/2017
 * Time: 11:27 PM
 */

class WeatherDB
{
    public $host = '127.0.0.1';
    public $db = 'weatherforecast';
    public $user = 'root';
    public $pass = '';
    public $charset = 'utf8';

    public function connect()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
        return $pdo = new PDO ($dsn, $this->user, $this->pass, $opt);
    }

    public function createTable(){
        $sql = "CREATE TABLE weather (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    tempMin FLOAT,
    tempMax FLOAT,
    tempPressure FLOAT,
    tempHumidity INT,
    weatherCondition VARCHAR(50),
    description VARCHAR(50),
    windSpeed FLOAT,
    date DATETIME
    )";

        $this->connect()->exec($sql);
        return "Table created successfully";
    }
}


//try {
//    $conn = new PDO("mysql:host=127.0.0.1;dbname=weatherforecast", "root");
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    $sql = "CREATE TABLE weather (
//    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//    tempMin FLOAT,
//    tempMax FLOAT,
//    tempPressure FLOAT,
//    tempHumidity INT,
//    weatherCondition VARCHAR(50),
//    description VARCHAR(50),
//    date DATETIME
//    )";
//
//    $conn->exec($sql);
//    echo "Table created successfully";
//
//} catch (PDOException $e) {
//    echo $sql . "<br>" . $e->getMessage();
//}

