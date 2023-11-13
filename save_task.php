<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $codigopostal = $_POST['codigopostal'];
  $query = "INSERT INTO task(nombre, apellido, direccion, telefono, correo, codigopostal) VALUES ('$nombre', '$apellido', '$direccion', '$telefono', '$correo', '$codigopostal')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
