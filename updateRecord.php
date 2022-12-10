<?php

include 'db_connection.php';

echo "<link rel='stylesheet' href='prayerTable.css'  />";

$fajr = $_POST['fajr'];
$zuhar = $_POST['zuhar'];
$asr = $_POST['asr'];
$magrib = $_POST['magrib'];
$isha = $_POST['isha'];
$prayer_date = $_POST['prayer_date'];

$conn = createConnection();

if(!$conn)
{
    echo "Not connected with database ".mysql_connect_error();
}
else
{
        $query = "update `prayers` set `prayer_date` = '$prayer_date', `fajr` = '$fajr',`zuhar` = '$zuhar' , `asr` = '$asr' ,`magrib` = '$magrib' ,`isha` = '$isha' where `prayer_date` = '$prayer_date'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            echo "Record added Succesfully";
            header('Location:viewAll.php');
            exit;
        }
        else
        {
            echo mysqli_error($conn);
        }
}

$conn->close();
?>