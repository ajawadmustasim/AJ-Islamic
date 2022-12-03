<?php

function createConnection()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbName = "mydb";
    $conn = mysqli_connect($host, $username, $password, $dbName);
    return $conn;
}

?>