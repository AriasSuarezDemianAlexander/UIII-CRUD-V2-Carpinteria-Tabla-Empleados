<?php
include("db.php");
$nombre= '';
$apellido= '';
$direccion= '';
$telefono= '';
$correo= '';
$codigopostal= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $correo = $row['correo'];
    $codigopostal = $row['codigopostal'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $codigopostal = $_POST['codigopostal'];

  $query = "UPDATE task set nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', telefono = '$telefono', correo = '$correo', codigopostal = '$codigopostal' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">

        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <textarea name="apellido" class="form-control" cols="30" rows="10"><?php echo $apellido;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="direccion" class="form-control" cols="30" rows="10"><?php echo $direccion;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="telefono" class="form-control" cols="30" rows="10"><?php echo $telefono;?></textarea>
        </div>
        <div class="form-group">
        <input name="correo" type="email" class="form-control" cols="30" rows="10"><?php echo $correo;?></input>
        </div>
        <div class="form-group">
        <textarea name="codigopostal" class="form-control" cols="30" rows="10"><?php echo $codigopostal;?></textarea>
        </div>





        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
