

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - AJ Islamic</title>
    <link rel="icon" type="image/x-icon" href="./logo.jpg">
    <script>
        
    </script>
    
    <style>
        h1
        {
            margin-top: 15%;
        }
        table, p, h1
        {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }
        body
        {
            background-image: url('art.png');
            background-position: top center;
            background-size: cover;
            background-repeat: repeat-y;
        }
        #button
        {
            border: 2px solid black;
            border-radius: 30px;
            padding: 5px 15px 5px 15px;
        }
        p
        {
            text-align: auto;
            margin-top :50px;
        }
        button:hover
        {
            background-color: rgb(210 209 238);
        }
        #button:hover
        {
            background-color: rgb(247, 240, 150);
            cursor: pointer;
        }
    </style>

</head>
<body>
        <div>
        <h1>Admin Login - AJ Islamic</h1>
        <p>Login here to edit record!</p>
        
        <form action="login.php" method="post">
        <table>
            <tr>
                <td><label>Enter username : </label></td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td><label>Enter password : </label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><label for="edit">Edit :</label></td>
                    <td><select id="edit" name="edit">
                    <option value="PrayerviewAll">Prayer Record</option>
                    <option value="articlesUpload">Articles/Videos</option>
                    </select></td>
            </tr>
            <tr>
                <td></td>
                <td><input name="submit" type="submit" value="Sign In" id="button"></td>
            </tr>       
        </table>
        </form>
</body>
</html>

<?php
 
    if(isset($_POST['submit']))
    {
        $edit = $_POST['edit'];
    if($_POST['username'] == "admin")
    {
        if($_POST['password'] == "password")
        {
            $username = $_POST["username"];
            session_start();
            $_SESSION["user"] = $username;
            header('Location:'. $edit.'.php');
        }
        else
        {
            echo "<p>Invalid username or password! <a href='$edit.php'> <button> Go Back </button> </a></p>";
        }
    }
    else
    {
        echo "<p>Invalid username or password! <a href='$edit.php'> <button> Go Back </button> </a></p>";
    }
    }
?>