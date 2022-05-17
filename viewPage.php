<?php

    include "config.php";

    $sql = "SELECT * FROM user_form";

    $result = $conn ->query ($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Empleados</title>
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
        <h2> Usuarios </h2>
    <table class = "table">
        <head>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Numero</th>
                <th>Direccion</th>
                <th>Rfc</th>
                <th>Curp</th>
                <th>Tipo de usuario</th>
            </tr>
            </thread>
            <tbody>
                <?php
                if($result -> num_rows > 0 ){
                    while ($row = $result -> fetch_assoc()){

                ?>

                <tr>
                    <td> <?php echo $row['id']; ?> </td>
                    <td> <?php echo $row['name']; ?> </td>
                    <td> <?php echo $row['email']; ?> </td>
                    <td> <?php echo $row['numero']; ?> </td>
                    <td> <?php echo $row['direccion']; ?> </td>
                    <td> <?php echo $row['rfc']; ?> </td>
                    <td> <?php echo $row['curp']; ?> </td>
                    <td> <?php echo $row['user_type']; ?> </td>
                    <td><a class= "btn btn-info" href="update.php?id=<?php echo $row["id"]; ?>">
                    Editar </a>&nbsp <a class = "btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">
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
     <a href="pdfs/pdf_empleados.php" class="btn" target="_blank">Ver PDF</a>
    <a href="register_form.php" class="btn">Registrar</a>
   <a href="logout.php" class="btn">Logout</a>
   </div>

</div>
            </body>
            </html>
