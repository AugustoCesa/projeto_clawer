<?php
include "include/MySql.php";

$nome = "";
$email = "";
$telefone = "";
$senha = "";

$nomeErro = "";
$emailErro = "";
$telefoneErro = "";
$senhaErro = "";
$msgErro = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

    if (empty($_POST['nome']))
        $nomeErro = "*Nome é obrigatorio!";
    else
        $nome = $_POST['nome'];

    if (empty($_POST['email']))
        $emailErro = "*Email é obrigatorio!";
    else
        $email = $_POST['email'];

    if (empty($_POST['telefone']))
        $telefoneErro = "*Telefone é obrigatorio!";
    else
        $telefone = $_POST['telefone'];

    if (empty($_POST["senha"]))
        $senhaErro = "*Senha é obrigatorio!";
    else
        $senha = $_POST['senha'];


    if ($email && $nome && $senha && $telefone) {
        //Verificar se ja existe o email
        $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE email = ?");
        if ($sql->execute(array($email))) {
            if ($sql->rowCount() <= 0) {
                $sql = $pdo->prepare("INSERT INTO USUARIO (codigo, nome, email, telefone, senha ) VALUES (null, ?, ?, ?, ?)");
                if ($sql->execute(array($nome, $email, $telefone, md5($senha)))) {
                    $msgErro = "Dados cadastrados com sucesso!";
                    $nome = "";
                    $email = "";
                    $telefone = "";
                    $senha = "";
                    header("location:login.php");
                } else {
                    $msgErro = "Dados não cadastrados!";
                }
            } else {
                $msgErro = "Email de usuario ja cadastrado! ";
            }
        } else {
            $msgErro = "Erro no comando SELECT!";
        }
    } else {
        $msgErro = "Dados não cadastrados!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadstro de Usuario</title>
    <link rel="stylesheet" href="assets/css/estillo.css">
</head>

<body>
    <form method="POST">
        <legend style="margin-bottom: 40px">CADASTRO</legend>
        <div class="container_input">
            <div class="label">Nome: </div>
            <div class="input">
                <input type="text" name="nome" value="<?php echo $nome ?>">
                <span class="obrigatorio"><?php echo $nomeErro ?></span>
            </div>
        </div>

        <div class="container_input">
            <div class="label">Email:</div>
            <div class="input">
                <input type="text" name="email" value="<?php echo $email ?>">
                <span class="obrigatorio"><?php echo $emailErro ?></span>
            </div>

        </div>
        <div class="container_input">
            <div class="label">Telefone:</div>
            <div class="input">
                <input type="text" name="telefone" value="<?php echo $telefone ?>">
                <span class="obrigatorio"><?php echo $telefoneErro ?></span>
            </div>
        </div>
        <div class="container_input">
            <div class="label">Senha:</div>
            <div class="input">
                <input type="password" name="senha" value="<?php echo $senha ?>">
                <span class="obrigatorio"><?php echo $senhaErro ?></span>
            </div>
        </div>
        <input type="submit" value="Salvar" name="submit">
        <span><?php echo $msgErro ?></span>
    </form>


    <style>
        body {
            font-family: sans-serif;
        }

        .container_input {
            display: flex;
            margin-bottom: 20px;
        }

        .container_input .label {
            flex: 1 1 auto;
        }

       

        form {
            background-color: #2f3640;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 60px;
            border-radius: 15px;
            color: white;


        }

        input {
            border-radius: 24px;
            padding: 10px 40px;
            background: #2f3640;
            border: 2px solid #3498db;
            color: white;


        }

        input[type="submit"] {
            background-color: #3498db;
            margin: 10px 140px;
            padding: 10px;
        }

        legend {
            font-size: 30px;
            font-family: 'moserrat', sans-serif;
            color: white;
            text-align: center;
        }

        body {
            background-color: #0C2A43;
        }

        .obrigatorio {
            display: block;
            text-align: center;
            color: red;
            font-size: 12px;
            font-weight: normal;
            /* margin-left: 50px; */
        }

        span{
            display: block;
            text-align: center;
        }
    </style>

</body>

</html>