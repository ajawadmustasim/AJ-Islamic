<?php
include 'db_connection.php';
$conn = createConnection();


if(isset($_POST['btnDel']))
{

    $date = $_POST['prayer_date'];
    $query ="DELETE FROM `prayers` WHERE `prayer_date` = '$date'";

    if($conn->query($query))
    {
        echo "Record Deleted Succesfully.<br>";
        header("Location:viewAll.php");
    }
    else{
        echo mysqli_error();
    }
}


if(isset($_POST['btnUpdate']))
{
    $prayer_date='';
    if( isset( $_POST['prayer_date'])) 
    {
        $prayer_date = $_POST['prayer_date']; 
    }
    header("Location:updateRecord.html?fajr=".$_POST['fajr']."&zuhar=".$_POST['zuhar']."&asr=".$_POST['asr']."&magrib=".$_POST['magrib']."&isha=".$_POST['isha']."&prayer_date=$prayer_date");
}

$query = "select * from prayers";
$result = $conn->query($query);
echo "<link rel='stylesheet' href='prayerTable.css'/>";



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
                    <input type='submit' value='Delete' name='btnDel' />
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
                        <input type='submit' value='Update' name='btnUpdate' />
                        </Form>
                    </td>
            </tr>";
    }
    
    echo "</table>";
}

$conn->close();
?>