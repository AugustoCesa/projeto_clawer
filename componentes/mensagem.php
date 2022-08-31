<?php include "../include/MySql.php" ?>

<?php

$nome = "";
$email = "";
$mensagem = "";
$mensagemUser="";

$nomeErro = "";
$emailErro = "";
$mensagemErro = "";




if (empty($_POST['nome']))
    $nomeErro = "Nome é obrigatório!";
else
    $nome = $_POST['nome'];

if (empty($_POST['email']))
    $emailErro = "email é obrigatório!";
else
    $email = $_POST['email'];

if (empty($_POST['mensagem']))
    $mensagemErro = "Mensagem é obrigatório!";
else
    $mensagem = $_POST['mensagem'];


if ($nome && $email && $mensagem) {
    //Verificar se a mensagem já existe
    $sql = $pdo->prepare("SELECT * FROM mensagem WHERE mensagemUser = ?");
    if ($sql->execute(array($mensagemUser))) {
        if ($sql->rowCount() <= 0) {
            $sql = $pdo->prepare("INSERT INTO carros (codigo, nome, email, mensagemUser, CodUsuario)
                                                VALUES (null, ?, ?, ?, NULL)");
            if ($sql->execute(array($nome, $email, $mensagem))) {
                $msgErro = "Dados cadastrados com sucesso!";
                $nome = "";
                $email = "";
                $mensagem = "";

                header('location:login.php');
            } else {
                $msgErro = "Dados não cadastrados!";
            }
        } else {
            $msgErro = "Email de usuário já cadastrado!!";
        }
    } else {
        $msgErro = "Erro no comando SELECT!";
    }
} else {
    $msgErro = "Dados não cadastrados!";
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Mensagem</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>

<body>

    <div style="display:flex; justify-content:center">
        <form method="POST" enctype="multipart/form-data">
            <fieldset style="display: flex; flex-direction: column;">
                <legend>Cadastro de Carro</legend>

                nome: <input type="text" name="nome" value="<?php echo $nome ?>">
                <span class="obrigatorio">*<?php echo $nomeErro ?></span>
                <br>
                email: <input type="text" name="email" value="<?php echo $email ?>">
                <span class="obrigatorio">*<?php echo $emailErro ?></span>
                <br>
                Mensagem: <input type="text" name="mensagem" value="<?php echo $mensagem ?>">
                <span class="obrigatorio">*<?php echo $mensagemErro ?></span>
                <br>

                <input type="submit" value="Salvar" name="submit">
            </fieldset>
        </form>
    </div>
</body>

</html>