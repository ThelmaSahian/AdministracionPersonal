<?php

include 'config.php';

if(isset($_POST['submit'])){

   /*$IdProducto = mysqli_real_escape_string($conn, $_POST['IdProducto']);*/
   $CodigoProducto = mysqli_real_escape_string($conn, $_POST['CodigoProducto']);
   $NombreProducto = mysqli_real_escape_string($conn, $_POST['NombreProducto']);
   $DescripcionProducto = mysqli_real_escape_string ($conn, $_POST['DescripcionProducto']);
   $UnidadMedida = mysqli_real_escape_string ($conn, $_POST['UnidadMedida']);
   $Cantidad = mysqli_real_escape_string ($conn, $_POST['Cantidad']);
   $Precio = mysqli_real_escape_string ($conn, $_POST['Precio']);

   $select = " SELECT * FROM materia_prima WHERE CodigoProducto = '$CodigoProducto' ";

   $result = mysqli_query($conn, $select );

   if(mysqli_num_rows($result) > 0){

      $error[] = "Existe un producto con el código $CodigoProducto. Favor de validar.";

   }else{
	$select = " SELECT * FROM materia_prima WHERE NombreProducto = '$NombreProducto' ";
   	$result = mysqli_query($conn, $select );

	if(mysqli_num_rows($result ) > 0){
		$error[] = "Existe un producto con el nombre $NombreProducto. Favor de validar.";
	}else{
		$insert = "INSERT INTO materia_prima (CodigoProducto, NombreProducto, DescripcionProducto, UnidadMedida, Cantidad, Precio) VALUES('$CodigoProducto','$NombreProducto','$DescripcionProducto','$UnidadMedida','$Cantidad','$Precio')";
        	mysqli_query($conn, $insert);
        	header('location:recursos.php');
	}
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registro</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Nuevo producto</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="CodigoProducto" required placeholder="Código">
      <input type="text" name="NombreProducto" required placeholder="Nombre">
      <input type="text" name="DescripcionProducto" required placeholder="Descripción">
      <input type="text" name="UnidadMedida" required placeholder="Unidad de medida">
      <input type="number" name="Cantidad" required placeholder="Cantidad" min="1">
      <input type="number" name="Precio" required placeholder="Precio" min="1">
      <input type="submit" name="submit" value="Agregar" class="form-btn" style = "background-color: #5bc0de;border-color: #46b8da;color: #fff;">
      <p> <a href="recursos.php">Ver Productos</a></p>
   </form>

</div>

</body>
</html>