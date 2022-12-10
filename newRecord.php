<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Entry</title>
    <link rel="stylesheet" href="prayerTable.css"/>
</head>
<body>
    <form action="addNew.php" method="post">
        <table>

            <tr>
                <td><label for="">Date : </label></td>
                <td><input type="date" name="prayer_date" id="prayer_date" value=<?php  if(isset($_GET['prayer_date'])) echo $_GET['prayer_date']; ?>> </td>
            </tr>

            <tr>
                <td><label for="">Enter Fajr Time : </label></td>
                <td><input type="time" name="fajr" id="fajr" value=<?php  if(isset($_GET['fajr'])) echo $_GET['fajr']; ?>></td>
            </tr>

            <tr>
                <td><label for="">Enter Zuhar Time : </label></td>
                <td><input type="time" name="zuhar" id="zuhar" value=<?php  if(isset($_GET['zuhar'])) echo $_GET['zuhar']; ?>></td>
            </tr>

            <tr>
                <td><label for="">Enter Asr Time : </label></td>
                <td><input type="time" name="asr" id="asr" value=<?php  if(isset($_GET['asr'])) echo $_GET['asr']; ?>></td>
            </tr>

            <tr>
                <td><label for="">Enter Magirb Time : </label></td>
                <td><input type="time" name="magrib" id="magrib" value=<?php  if(isset($_GET['magrib'])) echo $_GET['magrib']; ?>></td>
            </tr>

            <tr>
                <td><label for="">Enter Isha Time : </label></td>
                <td><input type="time" name="isha" id="isha" value=<?php  if(isset($_GET['isha'])) echo $_GET['isha']; ?>></td>
            </tr>
            
            
            <?php 
               
               
                    echo "<tr>
                    <td><input type='submit' value='Update' name='btnUpdate'></td>
                    <td><a href='prayerTimings.html' target='_parent'></a><button>Go back</button></a></td>
                </tr>";
               
             ?>

            

        </table>
    </form>
</body>
</html>