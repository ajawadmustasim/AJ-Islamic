<?php

echo "<link rel='stylesheet' href='prayerTable.css'  />";

    if($_POST['username'] == "admin")
    {
        if($_POST['password'] == "password")
        {
            header('Location: prayerTimings.html');
        }
        else
        {
            echo "Invalid username or password!";
            echo "<a href='prayers.php'> <button> Go Back </button> </a>";
        }
    }
    else
    {
        echo "Invalid username or password!";
        echo "<a href='prayers.php'> <button> Go Back </button> </a>";
    }

?>