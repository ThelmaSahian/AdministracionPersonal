<?php

    include "config.php";

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];

        $sql = "DELETE FROM user_form WHERE id = '$user_id'";

        $result = $conn -> query ($sql);

        if ($result == TRUE){
            echo "";
        }else{
            echo "Error".$sql."<br>".$conn->error;
        }

    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
       
    <div class="container">
    
       <div class="content">
          <h3>Usuario eliminado de forma exitosa</h3>
          <a href="viewPage.php" class="btn">Regresar</a>
       </div>
    
    </div>
    
    </body>
    </html>
