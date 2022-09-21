<?php
    include "include/MySql.php";

    $codigo = "";
    $nome = "";
    $email = "";
    $telefone = "";
    $senha = "";
    $administrador=0;


    $nomeErro = "";
    $emailErro = "";
    $telefoneErro = "";
    $senhaErro = "";
    $msgErro = "";

    if (isset($_GET['id'])){
        $codigo = $_GET['id'];
        $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE codigo = ?");
        if ($sql->execute(array($codigo))){
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($info as $key => $value){
             $codigo = $value['codigo'];
             $nome = $value['nome'];
             $email = $value['email'];
             $telefone = $value['telefone'];
             $senha = '';//$value['senha'];
             $administrador=$value['administrador'];   
            }
        }

    }

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

        if (empty($_POST['nome']))
          $nomeErro = "Nome é obrigatorio!";
        else
        $nome = $_POST['nome'];

        if (empty($_POST['email']))
        $emailErro = "Email é obrigatorio!";
        else
        $email = $_POST['email'];

        if (empty($_POST['telefone']))
        $telefoneErro = "Telefone é obrigatorio!";
        else
        $telefone = $_POST['telefone'];

        if (empty($_POST["senha"]))
        $senhaErro = "senha é obrigatorio!";
        else
        $senha = $_POST['senha'];

        if (isset($_POST["administrador"]))
            $administrador = 1;
        else
            $administrador = 0;        

        if ($email && $nome && $senha && $telefone) {
//Verificar se ja existe o email
$sql = $pdo->prepare("SELECT * FROM USUARIO WHERE email = ? AND codigo <> ?");
if($sql->execute(array($email, $codigo))){
    if($sql->rowCount() <= 0){
        $sql = $pdo->prepare("UPDATE USUARIO SET codigo=?, nome=?, email=?, telefone=?, senha=?, administrador=? WHERE codigo=?");

       if ($sql->execute(array($codigo,$nome, $email, $telefone, md5($senha),$administrador, $codigo))){
           $msgErro = "Dados alterados com sucesso!";
           header("location:listUsuario.php");
    }else{
        $msgErro = "Dados não cadastrados!";
    }
}else{
    $msgErro = "Email de usuario ja cadastrado!";
}
}else{
    $msgErro = "Erro no comando UPDATE!";
  }
}else{
        $msgErro = "Dados não alterados!";
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
        <fieldset>
            <legend>Cadastro de Usuario</legend>

            Nome: <input type="text" name="nome" value="<?php echo $nome?>">
            <span class="obrigatorio">*<?php echo $nomeErro?></span>
            <br>
            Email: <input type="text" name="email" value="<?php echo $email?>">
            <span  class="obrigatorio">*<?php echo $emailErro?></span>
            <br>
            Telefone: <input type="text" name="telefone" value="<?php echo $telefone?>">
            <span  class="obrigatorio">*<?php echo $telefoneErro?></span>
            <br>
            Senha: <input type="password" name="senha" value="<?php echo $senha?>">
            <span  class="obrigatorio">*<?php echo $senhaErro?></span>
            <br> 
            <?php
            if ($administrador==1){
            ?>
            <input type="checkbox" name="administrador" checked>
            <?php
            }else{  
            ?>
            <input type="checkbox" name="administrador" disabled>
            <?php
            }
            ?>
        </div>            
            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro?></span>
    
</body>
</html>