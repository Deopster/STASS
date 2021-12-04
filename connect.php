<?php
$host = 'localhost'; //имя хоста, на локальном компьютере этоlocalhost
$user = 'root'; //имя пользователя, по умолчанию это root
$password = ''; //пароль, по умолчанию пустой
$db_name = 'zachetka'; //имя базы данных

$hostname = "localhost";
$username = "root";
$pass = "";
$dbname = "zachetka";
$table = "auth";
$field_login="login";
$field_password="password";
$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");
?>