<?php

$user = 'root';
$password = '';
$db = 'db_users';
$host = 'localhost';

 $db = new PDO("mysql:host=$host;dbname=$db", $user, $password);

?>