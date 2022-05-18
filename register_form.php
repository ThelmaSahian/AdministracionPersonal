<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $numero = mysqli_real_escape_string ($conn, $_POST['numero']);
   $direccion = mysqli_real_escape_string ($conn, $_POST['direccion']);
   $rfc = mysqli_real_escape_string ($conn, $_POST['rfc']);
   $curp = mysqli_real_escape_string ($conn, $_POST['curp']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'El usuario ya existe';

   }else{

      if($pass != $cpass){
         $error[] = 'La contraseña no coincide';
      }else{
         $insert = "INSERT INTO user_form (name, email, numero, direccion, rfc, curp, password, user_type) VALUES('$name','$email','$numero','$direccion','$rfc','$curp','$pass','$user_type')";
         mysqli_query($conn, $insert);
         
         header('location:viewPage.php');
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
      <h3>Registro</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Ingresa tu nombre">
      <input type="email" name="email" required placeholder="Ingresa tu correo">
      <input type="number" name="numero" required placeholder="Ingresa un numero de contacto">
      <input type="text" name="direccion" required placeholder="Ingresa la direccion de tu casa">
      <input type="text" name="rfc" required placeholder="Favor de ingresar tu rfc">
      <input type="text" name="curp" required placeholder="Favor de ingresar tu curp">
      <input type="password" name="password" required placeholder="Ingresa tu contraseña">
      <input type="password" name="cpassword" required placeholder="Confirma tu contraseña">
      <select name="user_type">
         <option value="user">Usuario</option>
         <option value="admin">Administrador</option>
      </select>
      <input type="submit" name="submit" value="Registrarse" class="form-btn">
      <p>¿Ya tienes una cuenta? <a href="login_form.php">Login</a></p>
   </form>

</div>

</body>
</html>