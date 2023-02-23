<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AJ Islamic Officail Website HomePage - AJawad24">
    <meta tags="description" content="AJ, AJIslamic, AhmadJawadIslamic, Islamic, IslamicChannel, IslamicWebsite, AJawad24, AhmadJawad, HafizArhamAwan, Quran, QuranRecitaion, QuranRecitaionSeries ">
    <link rel="icon" type="image/x-icon" href="./logo.jpg">
    <link rel="stylesheet" href="./articles.css">
    <title>Articles & Videos - AJ Islamic</title>  
</head>
  
<Body>
    <div>
        <a id="home" href="index.html"><img id="h" src="h.png" alt="home"></a>
        <a id="home" href="login.php"><img id="u" src="u.png" alt="u"></a>
        <a class="rightButtons" href="./contact.html" id="contact">Contact Us</a>
        <a class="rightButtons" href="./index.html" id="about">Home & About</a>
    </div>

    <div id="header">
        <ul id="main">  
            <li><a id="active">About</a></li>     

<?php

    $folders = glob("./articles/*", GLOB_ONLYDIR );
    foreach($folders as $file)
    {
        $diplayName = substr(basename($file), 3);
        $link = basename($file);
        echo " <li class='dropdown'>
        <a class='dropbtn' href='./articles/$link.php'> $diplayName </a>
            <div class='dropdown-content'>";
        
            $Subfolders = glob("./articles/$link/*", GLOB_ONLYDIR ); 
        foreach($Subfolders as $file)
        {
            $diplayName = substr(basename($file), 3);
            $Sublink = basename($file);
           
            echo "<a href='./articles/$link/$Sublink.php'> $diplayName </a>";
        }
        echo "</div></li>";
    }
?>

</ul>
</div>
   
</body>
</html>