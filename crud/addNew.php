<?php

include 'db_connection.php';


$fajr = $_POST['fajr'];
$date = $_POST['date'];

$conn = createConnection();

if(!$conn)
{
    echo "Not connected with database ".mysql_connect_error();
}
else
{
    $query = "insert into `prayers`(`date`,`fajr`)values('$date', '$fajr')";
    $result = mysqli_query($conn, $query);
    if($result)
    {
        echo "Record added Succesfully";
        header('Location:index.html');
        exit;
    }
    else
    {
        echo mysqli_error($conn);
    }
}

$conn->close();
?>