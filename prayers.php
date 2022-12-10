<?php

include 'db_connection.php';
$conn = createConnection();

$query = "select * from prayers";
$result = $conn->query($query);

echo "<link rel='stylesheet' href='prayerTable.css'  />";

if($result->num_rows>0)
{
    echo "<table>
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
    echo "</table>";
}


$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prayer Timings</title>
</head>
<body>

    <br> <form action="dateSearch.php"> 
        <label>Select date to search : </label><input type="date" name="dateSearch" id="dateSearch">
        <input type="submit" value="search">
    </form>
    <form action="invalid.php" method="post">
        <br> <p>Login here to edit record!</p>
        <label>Enter username : </label><input type="text" name="username" id="username">
        <label>Enter password : </label><input type="password" name="password" id="password">
        <input type="submit" >       
    </form>
</body>
</html>