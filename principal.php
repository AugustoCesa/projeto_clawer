<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <?php if ($_SESSION['nome'] != ""){?>
    <h1>Olá <?php echo $_SESSION['nome']?>!!</h1>
    <h3><a href="listUsuario.php">Lista de Usuarios</a></h3>
    <h3><a href="logout.php">Logout</a></h3>
  <?php } else {?>
    <h1>Você não esta logado</h1>
    <h3><a href="login.php">Login</a></h3>

  <?php } ?>
</body>
</html>