<<?php
  include "config.php";
  $sql = "SELECT us.id ,us.name, ch.fecha, ch.fechaEntrada, ch.fechaSalida FROM checkin_form AS ch INNER JOIN user_form AS us ON ch.idEmpleado = us.id";
  $result = $conn -> query($sql);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pagina de administrador</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

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

<div class="container">
  <h2>Lista de asistencia</h2>
  <table class="table">
    <thead>
      <tr>
      <th>ID</th>
      <th>Empleado</th>
      <th>Fecha</th>
      <th>Fecha llegada</th>
      <th>Fecha salida</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if($result -> num_rows > 0 ){
          while ($row = $result -> fetch_assoc()){

      ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['fecha']; ?></td>
        <td><?php echo $row['fechaEntrada']; ?></td>
        <td><?php echo $row['fechaSalida']; ?></td>

      </tr>
      <?php
          }
        }
       ?>

    </tbody>

  </table>
 

</div>
<div class="container2">

<div class="content2">
<a href="admin_page.php" class="btn">Regresar</a>
</div>

</div>
</body>
</html>
