<?php
//Пароль для базы данных lifein2020_1: Qwerty!
// настройки см в beget Параметры для подключения:
$dbhost = "localhost";
$dbuser = "lifein2020_1";
$dbpass = "Qwerty!";
$dbname = "lifein2020_1";
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname); //$mysqli это объект
$mysqli->set_charset("utf-8"); // -> это вызов метода объекта

//Проверяем подключение :
if ($mysqli->connect_error) {
  die("Не удалось подключиться к БД".$mysqli->connect_error); 
}
