CREATE TABLE weather (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tempMin FLOAT,
    tempMax FLOAT,
    tempPressure FLOAT,
    tempHumidity INT,
    weatherCondition VARCHAR(50),
    description VARCHAR(50),
    windSpeed FLOAT,
    fullDate DATETIME,
    date DATE
    )