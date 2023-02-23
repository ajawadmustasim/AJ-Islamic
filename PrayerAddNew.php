<?php
session_start();

if($_SESSION["user"])
{

include 'db_connection.php';

echo "<link rel='stylesheet' href='prayer.css'  />";



$conn = createConnection();

if(!$conn)
{
    echo "Not connected with database ".mysql_connect_error();
}
else
{
    if(!empty($_POST['btnSubmit']))
    {
        $submit = $_POST['btnSubmit'];
        if($submit == "Cancel")
        {
            header("Location: PrayerviewAll.php");
        }
        else if($submit == "ADD")
        {
            $fajr = $_POST['fajr'];
            $zuhar = $_POST['zuhar'];
            $asr = $_POST['asr'];
            $magrib = $_POST['magrib'];
            $isha = $_POST['isha'];
            $date = '';
            $date = $_POST['prayer_date'];
 
            $query = "insert into `prayers`(`prayer_date`,`fajr`,`zuhar`,`asr`,`magrib`,`isha`)values('$date', '$fajr', '$zuhar', '$asr', '$magrib', '$isha')";
            $result = mysqli_query($conn, $query);
            if($result)
            {
                echo "Record added Succesfully";
                header("Location: PrayerviewAll.php");
                exit;
            }
            else
            {
                echo mysqli_error($conn);
            }
        }
    }
}

}
else
{
    header("Location:prayers.php");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Record Entry</title>
    <link rel='stylesheet' href='prayer.css'/>
    
    <style>
        #h
        {
            width: 7%;
            height: 7%;
        }
        #u
        {
            width: 4%;
            height: 4%;
            float: right;
        }
    </style>

</head>
<body>
    <form action='' method='post'>
        <table>

            <tr>
                <th><label for=''>Date : </label></th>
                <th><input type='date' name='prayer_date' id='prayer_date'></th>
            </tr>

            <tr>
                <td><label for=''>Enter Fajr Time : </label></td>
                <td><input type='time' name='fajr' id='fajr' ></td>
            </tr>

            <tr>
                <td><label for=''>Enter Zuhar Time : </label></td>
                <td><input type='time' name='zuhar' id='zuhar' ></td>
            </tr>

            <tr>
                <td><label for=''>Enter Asr Time : </label></td>
                <td><input type='time' name='asr' id='asr' ></td>
            </tr>

            <tr>
                <td><label for=''>Enter Magirb Time : </label></td>
                <td><input type='time' name='magrib' id='magrib' ></td>
            </tr>

            <tr>
                <td><label for=''>Enter Isha Time : </label></td>
                <td><input type='time' name='isha' id='isha' ></td>
            </tr>

            <tr>
                <td><input type='submit' value='Cancel' name='btnSubmit'></td>
                <td><input type='submit' value='ADD' name='btnSubmit'></td>
            </tr>

        </table>
    </form>
</body>
</html>


