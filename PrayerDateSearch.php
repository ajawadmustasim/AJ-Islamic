<?php

include 'db_connection.php';
$conn = createConnection();

$query = "select * from prayers";
$result = $conn->query($query);

echo "<link rel='stylesheet' href='prayer.css'/>";

$found =false;

if($result->num_rows>0)
{   
    while($row = $result->fetch_assoc())
    {
        if($_GET['dateSearch'] == $row['prayer_date'])
        {
            $found = true;
        echo "
            <table>
            <tr>
                <th>Date</th>
                <th>Fajr</th>
                <th>Zuhar</th>
                <th>Asr</th>
                <th>Magrib</th>
                <th>Isha</th>
            </tr>
            <tr>
                <td>".$row['prayer_date']."</td>
                <td>".$row['fajr']."</td>
                <td>".$row['zuhar']."</td>
                <td>".$row['asr']."</td>
                <td>".$row['magrib']."</td>
                <td>".$row['isha']."</td>
            </tr>";
        }
    }    
    echo "</table>";
}

if($found == false)
{
    echo "<h1>No results found!</h1><br>";
} 

echo "<a href='prayers.php'> <button> Go Back </button> </a>";

$conn->close();

?>