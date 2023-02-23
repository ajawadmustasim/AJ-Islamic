<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prayer Timings</title>
    <link rel="icon" type="image/x-icon" href="logo.jpg">
    <link rel="stylesheet" href="prayer.css"/>
    <style>
        #h
        {
            width: 7%;
            height: 7%;
            margin-left: 0px;
            float:left;
        }
        #u
        {
            width: 2%;
            height: 2%;
            float: right;
        }
        #u:hover
        {
            width: 2.2%;
            height: 2.2%;
        }
        form
        {
            margin-top: 10px;
            margin-bottom: 50px;
        }
        #contact, #about
        {
            float: right;
            border: 2px solid black;
            border-radius: 30px;
            padding: 1px 1px 1px 1px;
            margin: 2px 2px 2px 2px;
            background-color: #d1d0ee;
            text-decoration: none;
        }
#contact:hover , #about:hover
{
    background-color: #f0e49d;
    cursor: pointer;
}
    </style>
</head>

<body>
    <div>
        <a id="home" href="./index.html"><img id="h" src="h.png" alt="home"></a>
        <a id="home" href="login.php"><img id="u" src="u.png" alt="u"></a>
        <a class="rightButtons" href="./contact.html"><button id="contact">Contact Us</button></a>
        <a class="rightButtons" href="./index.html"><button id="about">Home & About</button></a>
    </div><br>    
    
    <h1>Prayer Timings</h1>
    
</body>
</html>

<?php

include 'db_connection.php';
$conn = createConnection();

$query = "select * from prayers";
$result = $conn->query($query);

if($result->num_rows>0)
{
    echo "
    
        <form action='PrayerDateSearch.php'> 
            <label>Select date to search : </label><input type='date' name='dateSearch' id='dateSearch'>
            <input type='submit' value='search'>
        </form>

    <table>
        <tr>
            <th>Date</th>
            <th>Fajr</th>
            <th>Zuhar</th>
            <th>Asr</th>
            <th>Magrib</th>
            <th>Isha</th>
        </tr>";
    
    while($row = $result->fetch_assoc())
    {
        echo "<tr>
                    <td>".$row['prayer_date']."</td>
                    <td>".$row['fajr']."</td>
                    <td>".$row['zuhar']."</td>
                    <td>".$row['asr']."</td>
                    <td>".$row['magrib']."</td>
                    <td>".$row['isha']."</td>
            </tr>";
    }    
    echo "</table>
    
    ";
}


$conn->close();

?>