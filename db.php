<?php 
$servername = "db";
$username = "root";
$password = "myrootpass";
$dbName = "mydb";
//Подключение к MariaDB
$link = mysqli_connect($servername, $username, $password);
//Вывод ошибки при её возникновении
if (!$link) {
    die("Ошибка подключения: " . mysqli_connection_error());
}
//Создание БД, если ещё не создана
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
//Вывод ошибки при её возникновении
if (!mysqli_query($link, $sql)) {
    echo "Не удалось создать БД";
  }
//Закроем подключение с MariaDB
mysqli_close($link);
//Подключение к БД
$link = mysqli_connect($servername, $username, $password, $dbName);
//Запрос на создание таблицы
$sql = "CREATE TABLE IF NOT EXISTS users(
    id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(20) NOT NULL
  )";
//Вывод ошибки при её возникновении
if(!mysqli_query($link, $sql)) {
    echo "Не удалось создать таблицу Users";
  }

$sql = "CREATE TABLE IF NOT EXISTS posts(
    id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    main_text VARCHAR(400) NOT NULL
  )";
//Вывод ошибки при её возникновении
if(!mysqli_query($link, $sql)) {
    echo "Не удалось создать таблицу Posts";
  }
mysqli_close($link);
?>