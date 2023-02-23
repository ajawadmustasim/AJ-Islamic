<?php

   session_start();

   if(isset($_POST["Exit"]))
   {
      session_destroy();
      header("Location:articles.php");
   }

   if($_SESSION["user"])
   {

   if( isset($_FILES['image']) && isset($_FILES['page']) )
   {
      $title = $_POST['title'];
      $topic = $_POST['topic'];

      //variables for thumbnail
      $img_name = $_FILES['image']['name'];
      $img_size =$_FILES['image']['size'];
      $img_tmp =$_FILES['image']['tmp_name'];
      $img_type=$_FILES['image']['type'];
          
      $img_ext= explode('.',$img_name);
      $img_ext = end($img_ext);
      $valid_ext_img = array("jpeg","jpg","png");

      //variables for page
      $page_name = $_FILES['page']['name'];
      $page_size =$_FILES['page']['size'];
      $page_tmp =$_FILES['page']['tmp_name'];
      $page_type=$_FILES['page']['type'];
      
      
      $page_ext = explode('.',$page_name);
      $page_ext = end($page_ext);
      $valid_ext_page = "php"; 

      if(in_array($img_ext,$valid_ext_img)=== false)
      {
         echo"extension not allowed, please choose a JPEG or PNG file.";
      }
      if($page_ext !== "$valid_ext_page")
      {
         echo"extension not allowed, please choose a PHP file.";
      }
      else
      {
         $img = $title.".".$img_ext;
         $page = $title.".".$page_ext;
         
         if(file_exists("./articles/".$img) || file_exists("./articles/".$page))
         { 
            echo "File with this title already exists! Try again with different title! <br>";
         }
         else
         {
            move_uploaded_file($img_tmp,"./articles/".$topic."/".$img);
            move_uploaded_file($page_tmp,"./articles/".$topic."/".$page);
            echo "Thumbnail and page successfully uploaded!";            
         }
      }
   }

   }
   else
   {
         header("Location:articles.php");
   }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload - AJ Islamic</title>
    <link rel="icon" type="image/x-icon" href="./logo.jpg">
</head>

   <style>
      body
      {
         background-image: url('background.png');
      }
      table
      {
         margin-left: auto;
         margin-right: auto;
      }
      h2
      {
         margin-top: 5%;
         text-align: center;
      }
   </style>

   <body>
      
      <h2>Upload new article or video</h2>
      <form action="" method="POST" enctype="multipart/form-data">
      <table>
         <tr>
            <td>Enter Title : </td>
            <td><input type="text" name ="title"></td>
         </tr>
         <tr>
            <td>Upload thumbnail : </td>
            <td><input type="file" name="image" ></td>
         </tr>
         <tr>
            <td>Upload page : </td>
            <td><input type="file" name="page" ></td>
         </tr>
         <tr>
            <td>Select topic : </td>
            <td>
               <select id="topic" name="topic">
               
               <?php

               $folders = glob("./articles/*", GLOB_ONLYDIR );
               foreach($folders as $file)
               {
                  $diplayName = substr(basename($file), 3);
                  $link = basename($file);
                  echo " <option value='.$file.'>$diplayName</option>";
        
                  $Subfolders = glob("./articles/$link/*", GLOB_ONLYDIR ); 
                  foreach($Subfolders as $file)
                  {
                     $diplayName = substr(basename($file), 3);
                     $link = basename($file);
                     echo " <option value='.$file.'>$diplayName</option>";
                  }
               }
               echo "</select>";

               ?>   
            </td>
         </tr>
         <tr>
            <td></td>
            <td><button name ="Exit" value="Exit">Exit Uploading</button>
               <input type="submit"></td>
         </tr>
      </table>
      </form>
      
   </body>
</html>