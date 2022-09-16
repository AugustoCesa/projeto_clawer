<?php
include "include/MySql.php";
include "include/functions.php";

session_start();
$_SESSION['nome'] = "";

$email = "";
$emailErro = "";
$senha = "";
$senhaErro = "";
$msgErro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['email'])) {
        $emailErro = "Email é obrigatorio";
    } else {
        $email = test_input($_POST['email']);
    }

    if (empty($_POST['senha'])) {
        $senhaErro = "Senha é obrigatorio";
    } else {
        $senha = test_input($_POST['senha']);
    }

    if ($email && $senha) {
        $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE email=? AND senha=?");
        if ($sql->execute(array($email, MD5($senha)))) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            if (count($info) > 0) {
                foreach ($info as $key => $values) {
                    $_SESSION['nome'] = $values['nome'];
                    header('location:index.php');
                }
            } else {
                $msgErro = "Usuario não cadastrado";
            }
        } else {
            $msgErro = "Usuario não cadastrado!";
        }
    }
}






?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>

</head>

<body>
    <div class="formu">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <legend>Login</legend>

        <input type="text" name="email" placeholder="Digite seu email" value="<?php echo $email ?>">
        <span class="obrigatorio"><?php echo $emailErro ?></span>
        <br>
        <input type="password" name="senha" placeholder="Digite sua senha" value="<?php echo $senha ?>">
        <span class="obrigatorio"><?php echo $senhaErro ?></span>
        <input type="submit" value="Enviar" name="login">
        <br>
        <a style="text-align: center;" href="cadUsuario.php">Novo cadastro</a>
    </form>
    </div>
    <span><?php echo $msgErro ?></span>

    <style>

.formu{
  display: flex;
  justify-content: center;
  margin: 0 auto ;
  padding: 0 auto;
  width: 100%;
}

        legend {
            color: white;
            text-align: center;
            text-transform: uppercase;
            font-weight: 300;
            font-size: 2.5em;
            font-family: 'moserrat', sans-serif;
            width: 20px 10px;
            margin: 25px;


        }

        input[type="text"],
        [type="password"],
        [type="submit"] {
            border: 0;
            background: #2f3640;
            display: block;
            margin: 0 auto;
            text-align: center;
            border: 2px solid #3498db;
            padding: 14px 40px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer;
            font-size: 1em;
            color: white;
        }

        input[type="submit"] {
            background: #3498db;
        }

        form {
            background: #2f3640;
            padding: 5px;
            margin-top: 200px;
            height: 350px;
            width: 350px;
            border-radius: 12px;
        }

        body {
            background-color: #0C2A43;
        }

        form a {
            color: white;
            margin: 126px;
font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial;
        }

        h2 {
            color: white
        }

        p {
            color: white;
        }

        .obrigatorio{
            color: red;
            font-size: 12px;
            font-weight: normal;
            margin-left: 50px;
            
        }
    </style>

</body>

</html>