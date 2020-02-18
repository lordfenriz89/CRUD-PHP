<?php

require('db.php');

if (isset($_GET['id'])) {
   $id=$_GET['id'];
   $query= "SELECT * FROM videojuegos WHERE id=$id";
   $resultado= mysqli_query($conexion, $query);
   if (mysqli_num_rows($resultado)==1) {
       $row= mysqli_fetch_array($resultado);
       $nombre= $row['nombre'];
       $description= $row['description'];

   }
}

if (isset($_POST['editar'])) {
    $id= $_GET['id'];
    $nombre= $_POST['nombre'];
    $description=$_POST['description'];

    $query= "UPDATE videojuegos set nombre='$nombre', description= '$description' WHERE id= $id ";
    $resultado=mysqli_query($conexion, $query);


    $_SESSION['mensaje']='Videojuego editado con éxito!';
    header('Location:index.php');
    
}

?>

<?php require('inclued/header.php') ?>

<div class="container p-4">
<div class="row">
  <div class="col-md-4 mx-auto">
    <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
            <div class="form-group">
                <input type="text" name="nombre" value="<?php echo $nombre ?>" class="form-control" placeholder="Edita el nombre del Videojuego">
            </div>

            <div class="form-group">
                <textarea class="form-control"  placeholder="Edita la descripción del videojuego"name="description"  rows="2"><<?php echo $description ?> </textarea>
            </div>

            <button class="btn btn-success btn-block" name="editar">
            Editar
            </button>
        </form>
    </div>
  </div>
</div>

</div>

<?php require('inclued/footer.php') ?>