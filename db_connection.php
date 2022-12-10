<?php

function createConnection()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbName = "ajdb";
    $conn = mysqli_connect($host, $username, $password, $dbName);
    return $conn;
}

?>