<?php include "../include/MySql.php" ?>

<?php

$nome = "";
$email = "";
$mensageUser="";

$nomeErro = "";
$emailErro = "";
$mensageErro = "";

$codigo="";


if (empty($_POST['nome']))
    $nomeErro = "Nome é obrigatório!";
else
    $nome = $_POST['nome'];

if (empty($_POST['email']))
    $emailErro = "email é obrigatório!";
else
    $email = $_POST['email'];

if (empty($_POST['mensage']))
    $mensageErro = "Mensagem é obrigatório!";
else
    $mensageUser = $_POST['mensage'];


if ($nome && $mensageUser) {
    //Verificar se a mensagem já existe
    $sql = $pdo->prepare("SELECT * FROM MENSAGEM WHERE mensageUser = ?");
    if ($sql->execute(array($mensageUser))) {
        if ($sql->rowCount() <= 0) {
            $sql = $pdo->prepare(" INSERT INTO MENSAGE(codigo, nome, email, mensageUser,)
                                                VALUES (NULL, ?, ?, ?)");
            if ($sql->execute(array( $nome, $email, $mensageUser))) {
                $msgErro = "Dados cadastrados com sucesso!";
                $nome = "";
                $email = "";
                $mensageUser = "";

                header('location:../index.php');
            } else {
                $msgErro = "Dados não cadastrados!";
            }
        } else {
            $msgErro = "mensagem de usuário já enviada!";
        }
    } else {
        $msgErro = "Erro no comando SELECT!";
    }
} else {
    $msgErro = "Dados não enviados!";
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
                <span class="obrigatorio"style="font-size: x-small" >*<?php echo $nomeErro ?></span>
                <br>
                email: <input type="email" name="email" value="<?php echo $email ?>">
                <span class="obrigatorio" style="font-size: x-small">*<?php echo $emailErro ?></span>
                <br>
                Mensagem: <input type="text" name="mensage" value="<?php echo $mensageUser ?>">
                <span class="obrigatorio" style="font-size: x-small;">*<?php echo $mensageErro ?></span>
                <br>

                
                <input type="submit" value="Salvar" name="submit">
            </fieldset>
        </form>
    </div>
</body>

</html>