<?php include "config.php"; include "form_validation.php";
     //$link = connect_db();  
?>


<!DOCTYPE html>
<html lang="en">
        <head>
                <link href="style.css" rel="stylesheet">
                <meta charset ="utf-8">
                <title>Eccryption and Decryption</title>
                 
        </head>
        
        <body>
        <div>
            <div>
            
            <?php
            include "form.php";
            if(isset($_POST['action'])=='validation'){
                form_validation();
            }
            ?>
                </div> <!-- end 2nd form-->                
         </div> <!-- end container-->  
          <a href="index.php">Preview Database</a>
                  
        </body>
        
</html>
