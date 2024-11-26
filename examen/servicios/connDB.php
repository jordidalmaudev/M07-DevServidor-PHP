<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mp07uf1_exam";

$mysqlConnection = mysqli_connect($servername, $username, $password, $dbname);

try {
    if ($mysqlConnection) {
        echo "Connected to $dbname at $servername successfully";
    } else {
        throw new Exception("An exception occurred: " . mysqli_connect_error());
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die(); // finaliza el script por completo, antes era exit() o puede serlo.
}
