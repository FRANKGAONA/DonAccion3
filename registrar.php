<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO usuarios (nombre, email, password)
          VALUES ('$nombre', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    header("Location: login.html"); // Redirige al login después de registrarse
    exit();
  } else {
    echo "❌ Error: " . $conn->error;
  }

  $conn->close();
}
?>

