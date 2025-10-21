<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM usuarios WHERE email = '$email'";
  $resultado = $conn->query($sql);

  if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();

    if (password_verify($password, $usuario['password'])) {
      $_SESSION["nombre"] = $usuario["nombre"];
      header("Location: inicio.php");
      exit();
    } else {
      echo "❌ Contraseña incorrecta.";
    }
  } else {
    echo "❌ No existe una cuenta con ese correo.";
  }

  $conn->close();
}
?>

