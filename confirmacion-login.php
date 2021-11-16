<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Formulario de confirmacion de login exitoso">
  <meta name="keywords" content="Login exitoso,formulario,confirmacion">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />  <link rel="stylesheet" href="css/styles.css">
  <title>Customer Service Bar</title>
</head>

<body>
  <img src="images/logo.png" alt="logo" class="logo">
  <div>
    <h1 class="title">Customer Service Bar</h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="col mb-4">
        <i class="fas fa-bars menu-button" onclick="toggleMenu(event)"></i>
      </div>
    </div>
  </div>
  <nav>
    <ul class="menu">
      <li><a href="index.html">INICIO</a> </li>
      <li><a href="productos.html">PRODUCTOS</a> </li>
      <li><a href="reserva.html">RESERVAS</a> </li>
      <li><a href="Quienessomos.html">QUIENES SOMOS</a> </li>
      <li><a href="login.html">LOGIN</a> </li>
    </ul>
  </nav>
  <h1 class="title">Inicio de sesión</h1>   
  <div class="container">
    <div class="row">
      <div class="col">
          <?php
          session_start();
          require_once "database.php";
          $email = $_POST["email"];
          $contraseña = $_POST["contraseña"];
          $sql = "SELECT cliente.nombre, cliente.idCliente FROM usuario JOIN cliente on usuario.idCliente = cliente.idCliente
          WHERE usuario.email = ? and usuario.contraseña = ?";
          $select = $conn -> prepare($sql);
          $select -> bind_param("ss", $email, $contraseña);
          $select -> execute();
          $result = $select -> get_result();
          if($result -> num_rows > 0) {
            $row = $result -> fetch_assoc();
            $_SESSION["bar_nombre"] = $row["nombre"];
            $_SESSION['bar_loggedin'] = true;
            $_SESSION["bar_idCliente"] = $row["idCliente"];

            echo "<p class='alert alert-success'>Bienvenida " . $row["nombre"] . "</p>";
          } else {
              echo "<p class='alert alert-danger'>Usuario y contraseña incorrectos</p>";
          }
        ?>
      </div>
    </div>
  </div>

    <script type="text/javascript" src="./funcionesGrupo7.js"></script>
    <script type="text/javascript">
      redirigirAlIndex();
    </script>
  <footer class="footer-style">
    Copyright © Todos los derechos reservados
  </footer>
</body>

</html>