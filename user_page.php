<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

date_default_timezone_set('America/Mexico_City');

$id = $_SESSION['user_id'];
$fecha = date("Y-m-d");
$sql = "SELECT * FROM checkin_form WHERE idEmpleado = $id AND fecha = '$fecha'";
$result = $conn ->query ($sql);



if(isset($_POST['submitEntrada'])){
  $fechaEntrada = date("Y-m-d H:i:s");
  $insert = "INSERT INTO checkin_form(idEmpleado, fecha, fechaEntrada) VALUES ($id, '$fecha', '$fechaEntrada')";
  mysqli_query($conn, $insert);
  header('location:user_page.php');
}

if(isset($_POST['submitSalida'])){
  $fechaSalida = date("Y-m-d H:i:s");
  $update = "UPDATE checkin_form SET fechaSalida = '$fechaSalida' WHERE idEmpleado = $id";
  mysqli_query($conn, $update);
  header('location:user_page.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registro de usuario</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style >
     .shadow{
       box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
       padding:10px 10px 15px 10px;
       border: 1px solid rgba(0,0,0,0.3);
     }
   </style>
</head>
<body>

<div class="container">

   <div class="content shadow">
      <h3>Registro de <span>asistencia</span> </h3>
      <h1>Bienvenido <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <form action="" method="post">
      <?php
        if($result -> num_rows == 0)
        {
      ?>
          <input type="submit" class="btn" name="submitEntrada" value="Marcar hora de llegada"/>
      <?php
        }
        else if($result -> num_rows == 1)
        {
          while ($row = $result -> fetch_assoc())
          {
      ?>

          <p><b>Fecha de entrada:</b> <?php echo $row['fechaEntrada'] ?> </p>
      <?php

            if($row['fechaSalida'] === null)
            {
      ?>
              <input type="submit" class="btn" name="submitSalida" value="Marcar hora de salida"/>

      <?php
            }
            else
            {
      ?>
          <p><b>Fecha de salida:</b> <?php echo $row['fechaSalida']?></p>
          <p>Ya cumplio con todos sus registros del dia.</p>
      <?php
            }
          }
        }
      ?>
         <a href="logout.php" class="btn">Cerrar sesión</a>
      </form>
   </div>

</div>

</body>
</html>
