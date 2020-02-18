<?include("db.php");?>
<?include("inclued/header.php");?>
<?include("inclued/footer.php");?>

<div class="contianer p-5">
<div class="row">
    <div class="col md-4">
    <?php if(isset($_SESSION['mensaje'])){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
       <?= $_SESSION['mensaje']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php  session_unset();} ?>
        
       
        <div class="card card-body">
        <form action="save.php" method="POST">
            <div class="form-group">
                <input type="text" name="nombre" class="form-control " placeholder="introduce tu videojuego favorito">
            </div>
            <div class="form-group">
                <textarea name="description"  rows="2" class="form-control" placeholder="describe aquí el videjuego "></textarea>
            </div>
            <input type="submit" class="btn btn-info btn-block" name="save" value="Guardar videojuego"> 
        </form>
        </div>
    </div>

<div class="col md-8">
    <table class="table table-bordered bg-warning">
        <thead>
            <tr>
                <th> Videojuego</th>
                <th>Descripción </th>
                <th >Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $query= "SELECT * FROM videojuegos";
            $resultado_games= mysqli_query($conexion, $query);

            while ($row= mysqli_fetch_array($resultado_games)) { ?>
              <tr>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td> <a class="btn btn-info" href="edit.php?id=<?php echo  $row['id']; ?>"><i class="fas fa-marker"></i></a>
                 <a class="btn btn-danger" href="delete.php?id=<?php echo  $row['id']; ?>"> <i class=" far fa-trash-alt"></i></a>
                 </td>
              </tr>
            <?php } ?>
            
            
           
        </tbody>


    </table>
</div>

</div>


</div>

