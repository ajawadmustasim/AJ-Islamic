<?php
include 'db_connection.php';
$conn = createConnection();

session_start();
if(isset($_GET["exit"]))
{
    session_destroy();
    header("Location:prayers.php");
}

if($_SESSION["user"])
{

if(isset($_POST['btnDel']))
{

    $date = $_POST['prayer_date'];
    $query ="DELETE FROM `prayers` WHERE `prayer_date` = '$date'";

    if($conn->query($query))
    {
        echo "Record Deleted Succesfully.<br>";
        header("Location:PrayerviewAll.php");
    }
    else{
        echo mysqli_error();
    }
}


if(isset($_POST['btnUpdate']))
{
    if( isset( $_POST['prayer_date'])) 
    {
        $date = $_POST['prayer_date']; 
    }
    header("Location:PrayerUpdate.php?fajr=".$_POST['fajr']."&zuhar=".$_POST['zuhar']."&asr=".$_POST['asr']."&magrib=".$_POST['magrib']."&isha=".$_POST['isha']."&prayer_date=$date");
}

$query = "select * from prayers";
$result = $conn->query($query);
echo "<link rel='stylesheet' href='prayer.css'/>";



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
            <th>Delete</th>
            <th>Update</th>
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
                    <td>
                    <Form method='post'>
                    <input type='hidden' value=".$row['prayer_date']." name='prayer_date'>
                    <input type='hidden' value=".$row['fajr']." name='fajr'>
                    <input type='hidden' value=".$row['zuhar']." name='zuhar'>
                    <input type='hidden' value=".$row['asr']." name='asr'>
                    <input type='hidden' value=".$row['magrib']." name='magrib'>
                    <input type='hidden' value=".$row['isha']." name='isha'>
                    <input type='submit' value='Delete' name='btnDel' class='btnDel'/>
                    </Form>
                    </td>
                    <td>
                        <Form method='post'>
                        <input type='hidden' value=".$row['prayer_date']." name='prayer_date'>
                        <input type='hidden' value=".$row['fajr']." name='fajr'>
                        <input type='hidden' value=".$row['zuhar']." name='zuhar'>
                        <input type='hidden' value=".$row['asr']." name='asr'>
                        <input type='hidden' value=".$row['magrib']." name='magrib'>
                        <input type='hidden' value=".$row['isha']." name='isha'>
                        <input type='submit' value='Update' name='btnUpdate' class='btnUpdate' />
                        </Form>
                    </td>
            </tr>";
    }
    
    echo "
    
    </table>
    
    
      ";
}

}
else
{
    header("Location:prayers.php");
}



$conn->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prayer Timings Editing</title>
</head>
<body>

    <a href='PrayeraddNew.php'><Button>Add new record</Button></a> <br><br><br>
    <form action="">
    <input name="exit" type="submit" id="exit" value="Exit Editing"/>
    </form>
    
</body>
</html>

