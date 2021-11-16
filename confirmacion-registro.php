<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formulario de registro de usuario">
    <meta name="keywords" content="Registrarse,formulario,usuario">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
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

    <h1 class="title">Registro exitoso</h1>

    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                  require_once "database.php";
                  $ins_cliente = $conn->prepare("INSERT INTO cliente (nombre, apellido, telefono, dni) VALUES (?, ?, ?, ?)");
                  $ins_cliente->bind_param("ssss", $nombre, $apellido, $telefono, $dni);
                  $nombre = $_POST["nombre"];
                  $apellido = $_POST["apellido"];
                  $telefono = $_POST["telefono"];
                  $dni = $_POST["dni"];

                  $ins_cliente->execute();
                  $ins_cliente->close();

                  $ins_usuario = $conn->prepare("INSERT INTO usuario (email, contraseña, idCliente) VALUES (?, ? , ?)");
                  $ins_usuario->bind_param("ssi", $email, $contraseña, $id_cliente);
                  $email = $_POST["email"];
                  $contraseña = $_POST["contraseña"];
                  $id_cliente = $conn->insert_id;

                  $ins_usuario->execute();
                  $ins_usuario->close();

                  echo "Nombre" . $_POST["nombre"] . "<br>";
                  echo "Apellido" . $_POST["apellido"] . "<br>";
                  echo "Email" . $_POST["email"] . "<br>";
                  echo "Telefono" . $_POST["telefono"] . "<br>";
                  echo "Documento" . $_POST["dni"] . "<br>";
                  echo "Contraseña" . $_POST["contraseña"] . "<br>";
                  echo "Repetir contraseña " . $_POST["rep-contraseña"] . "<br>";
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