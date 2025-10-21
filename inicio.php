<?php
session_start();
if (!isset($_SESSION["nombre"])) {
  header("Location: login.html");
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido - DonAcción</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #4facfe, #00f2fe);
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      text-align: center;
    }
    h1 {
      font-size: 2em;
    }
    .btn {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: white;
      color: #00f2fe;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      font-weight: bold;
    }
    .btn:hover {
      background-color: #4facfe;
      color: white;
    }
  </style>
</head>
<body>
  <h1>🎉 ¡Bienvenido, <?php echo $_SESSION["nombre"]; ?>!</h1>
  <p>Gracias por formar parte de DonAcción 💖</p>
  <form action="logout.php" method="POST">
    <button class="btn" type="submit">Cerrar sesión</button>
  </form>
</body>
</html>
