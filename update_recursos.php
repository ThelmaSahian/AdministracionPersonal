<?php

    include "config.php";

    
    if(isset($_POST['update'])){

        $IdProducto = $_GET['IdProducto'];
        $NombreProducto = mysqli_real_escape_string($conn, $_POST['NombreProducto']);
        $DescripcionProducto = mysqli_real_escape_string ($conn, $_POST['DescripcionProducto']);
        $UnidadMedida = mysqli_real_escape_string ($conn, $_POST['UnidadMedida']);
        $Cantidad = mysqli_real_escape_string ($conn, $_POST['Cantidad']);
        $Precio = mysqli_real_escape_string ($conn, $_POST['Precio']);


        $sql = "UPDATE materia_prima SET NombreProducto= '$NombreProducto', DescripcionProducto = '$DescripcionProducto', UnidadMedida = '$UnidadMedida', Cantidad = '$Cantidad', Precio = '$Precio' WHERE IdProducto = '$IdProducto'";
        $result = $conn ->query ($sql);
		
	if($result == TRUE){
            echo "
            <center><h2>Información actualizada correctamente</h2></center>";
       	}else{
            echo "Error: ". $sql."<br>" .$conn ->error;
       	}
    }

    if(isset($_GET['IdProducto'])){
        $IdProducto = $_GET['IdProducto'];

        $sql = "SELECT * FROM materia_prima WHERE IdProducto = '$IdProducto'";

        $result = $conn -> query ($sql);


        if($result -> num_rows > 0){
            while($row = $result ->fetch_assoc()){
                $IdProducto= $row['IdProducto'];
                $CodigoProducto = $row['CodigoProducto'];
                $NombreProducto = $row['NombreProducto'];
                $DescripcionProducto= $row['DescripcionProducto'];
                $UnidadMedida = $row['UnidadMedida'];
                $Cantidad = $row['Cantidad'];
                $Precio = $row['Precio'];
            }
        ?>



        <!DOCTYPE html>
            <html lang="en">
                <head>
                <link rel="stylesheet" href="css/style.css">
                </head>
                <body>

                    <div class="form-container">
    
                        <div class="content">
                            <center><h1>Actualizar información</h1></center>
                            <form action = "" method = "post">
                                <fieldset  style = "text-align:left;" >
                                    Código: <br>
                                    <input type ="text" name = "CodigoProducto" value = "<?php echo $CodigoProducto; ?>" disabled="disabled" />
                                    <input type ="hidden" name = "IdProducto" value = "<?php echo $IdProducto; ?>">
                                    <br>

                                    Nombre: <br>
                                    <input type ="text" name = "NombreProducto" value = "<?php echo $NombreProducto; ?>">
                                    <br>

                                    Descripción: <br>
                                    <input type ="numero" name = "DescripcionProducto" value = "<?php echo $DescripcionProducto; ?>">
                                    <br>

                                    Unidad de medida: <br>
                                    <input type ="text" name = "UnidadMedida" value = "<?php echo $UnidadMedida; ?>">
                                    <br>

                                    Cantidad: <br>
                                    <input type ="number" name = "Cantidad" value = "<?php echo $Cantidad; ?>" min="1">
                                    <br>

                                    Precio: <br>
                                    <input type ="number" name = "Precio" value = "<?php echo $Precio; ?>" min="1">
                                    <br>

                                    <br><br>
       

                                    <input type ="Submit" value = "Actualizar" name = "update" class = "form-btn">


                                    <a href="recursos.php">
                                    <input type ="button" value = "Regresar"  class = "form-btn" href="recursos.php">
                                    </a>

                                 
                        </div>
                    </div>  
			</fieldset>
                      </form>     
                </body>
            </html>
         <?php
         }else{
            header('Location: recursos.php');
         }

     }
?>