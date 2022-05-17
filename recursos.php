<?php

    include "config.php";

    $sql = "SELECT * FROM materia_prima";

    $result = $conn ->query ($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Recursos</title>
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>

.container2{
   min-height: 100vh;
   display: flex;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
}

.container2 .content2 .btn{
   display: inline-block;
   padding:10px 30px;
   font-size: 20px;
   background: #333;
   color:#fff;
   margin:0 5px;
   text-transform: capitalize;
}

.container2 .content2 .btn:hover{
   background: crimson;
}
        </style>


</head>
<body>
    <div class = "container">
        <h2> Recursos </h2>
	<br>
	<a style = "float: right;background-color: #7fdb40fa;border-color: #7fdb40fa;" class= "btn btn-info" href="add_recursos.php" > Agregar nuevo producto</a>
	<br><br><br><br>
    <table class = "table">
        <head>
            <tr>
                <th>Código Producto</th>
                <th>Nombre</th>
                <th>Descripci&oacute;n</th>
		<th>Unidad de Medida</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
            </thread>
            <tbody>
                <?php
                if($result -> num_rows > 0 ){
                    while ($row = $result -> fetch_assoc()){

                ?>

                <tr>
                    <td> <?php echo $row['CodigoProducto']; ?> </td>
                    <td> <?php echo $row['NombreProducto']; ?> </td>
                    <td> <?php echo $row['DescripcionProducto']; ?> </td>
                    <td> <?php echo $row['UnidadMedida']; ?> </td>
                    <td> <?php echo $row['Cantidad']; ?> </td>
                    <td> <?php echo $row['Precio']; ?> </td>
                    <td><a class= "btn btn-info" href="update_recursos.php?IdProducto=<?php echo $row["IdProducto"]; ?>" >
                    Editar </a>&nbsp <a class = "btn btn-danger" href="delete_recursos.php?IdProducto=<?php echo $row['IdProducto']; ?>">
                    Borrar</a></td>
                </tr>

                <?php }
                }
                ?>
                </tbody>
            </table>
            </div>

            <div class="container2">

   <div class="content2">
   <a href="pdfs/pdf_recursos.php" class="btn" target="_blank">Ver PDF</a>
   <a href="logout.php" class="btn">Logout</a>
   </div>

</div>
            </body>
            </html>
