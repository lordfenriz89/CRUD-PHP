<?php

require('db.php');

if(isset($_POST['save'])){
   $nombre= $_POST['nombre'];
   $description= $_POST['description'];
   
   $sql= "INSERT INTO videojuegos (nombre, description) VALUES ('$nombre', '$description')";
   $resultado= mysqli_query($conexion, $sql);
   
   if (!$resultado){
       die("error");
   }
   $_SESSION['mensaje']='Videojuego guardado';
   $_SESSION['mensaje_color']= 'success';

  header('Location: index.php');
}


?>