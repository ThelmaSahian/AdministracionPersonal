<?php

    include "config.php";

    if(isset($_GET['IdProducto'])){
        $IdProducto = $_GET['IdProducto'];

        $sql = "DELETE FROM materia_prima WHERE IdProducto = '$IdProducto'";

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
          <h3>Producto eliminado de forma exitosa</h3>
          <a href="recursos.php" class="btn">Regresar</a>
       </div>
    
    </div>
    
    </body>
    </html>
