<?php
$host = 'localhost'; //имя хоста, на локальном компьютере этоlocalhost
$user = 'root'; //имя пользователя, по умолчанию это root
$password = 'Andrey16'; //пароль, по умолчанию пустой
$db_name = 'zachetka'; //имя базы данных
global $link;
$link = mysqli_connect($host, $user, $password, $db_name,3306) or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");
?>