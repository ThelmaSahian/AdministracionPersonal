<?php

    include "config.php";

    
    if(isset($_POST['update'])){

        $user_id = $_GET['id'];
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $numero = mysqli_real_escape_string ($conn, $_POST['numero']);
        $direccion = mysqli_real_escape_string ($conn, $_POST['direccion']);
        $rfc = mysqli_real_escape_string ($conn, $_POST['rfc']);
        $curp = mysqli_real_escape_string ($conn, $_POST['curp']);

        $sql = "UPDATE user_form SET name = '$name', email = '$email', numero = '$numero', direccion = '$direccion', rfc = '$rfc',curp = '$curp' WHERE id = '$user_id'";


        $result = $conn ->query ($sql);

    if($result == TRUE){
        echo "
        <center><h2>Informacion actualizada correctamente</h2></center>";
    }else{
        echo "Error: ". $sql."<br>" .$conn ->error;
    }
}

if(isset($_GET['id'])){
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM user_form WHERE id = '$user_id'";

    $result = $conn -> query ($sql);


if($result -> num_rows > 0){
    while($row = $result ->fetch_assoc()){
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $numero = $row['numero'];
        $direccion = $row['direccion'];
        $rfc = $row['rfc'];
        $curp = $row['curp'];
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
    <center><h1>Actualizar informacion</h1></center>
    <form action = "" method = "post">
        <fieldset>
        Nombre: <br>
        <input type ="text" name = "name" value = "<?php echo $name; ?>">
        <input type ="hidden" name = "user_id" value = "<?php echo $id; ?>">
        <br>

        Email: <br>
        <input type ="email" name = "email" value = "<?php echo $email; ?>">
        <br>

        Numero de contacto: <br>
        <input type ="numero" name = "numero" value = "<?php echo $numero; ?>">
        <br>

        Direccion: <br>
        <input type ="text" name = "direccion" value = "<?php echo $direccion; ?>">
        <br>

        Rfc: <br>
        <input type ="text" name = "rfc" value = "<?php echo $rfc; ?>">
        <br>

        Curp: <br>
        <input type ="text" name = "curp" value = "<?php echo $curp; ?>">
        <br>

        <br><br>
       

        <input type ="Submit" value = "Actualizar" name = "update" class = "form-btn">


        <a href="viewPage.php">
        <input type ="button" value = "Regresar"  class = "form-btn" href="viewPage.php">
        </a>
        </div>
    
    </div>

    
</fieldset>
</form>
    </body>
    </html>



    <?php
}else{
    header('Location: viewPage.php');
}

}
?>