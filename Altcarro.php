<?php
include "../include/MySql.php";
$codigo="";
$marca = "";
$nome = "";
$preco = "";
$ano = "";
$cambio = "";
$portas = "";
$combustivel = "";
$kilometragem = "";
$placa = "";
$cor = "";
$modelo = "";
$imgContent = "";


$marcaErro = "";
$nomeErro = "";
$precoErro = "";
$anoErro = "";
$cambioErro = "";
$portasErro = "";
$combustivelErro = "";
$kilometragemErro = "";
$placaErro = "";
$corErro = "";
$modeloErro="";
$msgErro = "";

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM CARROS WHERE CodCarro = ?");
    if ($sql->execute(array($codigo))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $codigo = $value['codigo'];
            $marca = $value['marca'];
            $nome = $value['nome'];
            $preco = $value['preco'];
            $ano = $value['ano'];
            $cambio = $value['cambio'];
            $portas = $value['portas'];
            $combustivel = $value['combustivel'];
            $kilometragem = $value['kilometragem'];
            $placa = $value['placa'];
            $cor = $value['cor'];
            $modelo = $value['modelo'];
            $imgContent = $value['imagem'];
         
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    if (empty($_POST['marca']))
        $marcaErro = "Marca é obrigatório!";
    else
        $marca = $_POST['marca'];

    if (empty($_POST['nome']))
        $nomeErro = "Nome é obrigatório!";
    else
        $nome = $_POST['nome'];

    if (empty($_POST['preco']))
        $precoErro = "Preço é obrigatório!";
    else
        $preco = $_POST['preco'];

    if (empty($_POST['ano']))
        $anoErro = "ano é obrigatório!";
    else
        $ano= $_POST['ano'];

        if (empty($_POST['cambio']))
        $cambioErro = "cambio é obrigatório!";
    else
        $cambio= $_POST['cambio'];

        if (empty($_POST['portas']))
        $portasErro = "portas é obrigatório!";
    else
        $portas= $_POST['portas'];

        if (empty($_POST['combustivel']))
        $combustivelErro = "combustivel é obrigatório!";
    else
        $combustivel= $_POST['combustivel'];

        if (empty($_POST['kilometragem']))
        $kilometragemErro = "kilometragem é obrigatório!";
    else
        $kilometragem= $_POST['kilometragem'];

        if (empty($_POST['ano']))
        $anoErro = "ano é obrigatório!";
    else
        $ano= $_POST['ano'];




    if (!empty($_FILES["image"]["name"])) {
        //Pegar informações do arquivo
        $fileName = basename($_FILES['image']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        //Array de extensoes permitidas
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = file_get_contents($image);
        } else {
            $msgErro = "Somente arquivos JPG, JPEG, PNG e GIFF são permitidos";
        }
    }

    if ($email && $nome && $senha && $telefone) {
        //Verificar se ja existe o email
        $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE email = ? AND codigo <> ?");
        if ($sql->execute(array($email, $codigo))) {
            if ($sql->rowCount() <= 0) {
                $sql = $pdo->prepare("UPDATE USUARIO SET codigo=?, 
                                                             nome=?, 
                                                             email=?, 
                                                             telefone=?, 
                                                             senha=?,
                                                             administrador=?,
                                                             imagem=?
                                                       WHERE codigo=?");

                if ($sql->execute(array($codigo, $nome, $email, $telefone, md5($senha), $administrador, $imgContent, $codigo))) {
                    $msgErro = "Dados alterados com sucesso!";
                    header('location:listUsuario.php');
                } else {
                    $msgErro = "Dados não cadastrados!";
                }
            } else {
                $msgErro = "Email de usuário já cadastrado!!";
            }
        } else {
            $msgErro = "Erro no comando UPDATE!";
        }
    } else {
        $msgErro = "Dados não alteardos!";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Cadastro de Usuário</legend>

            Nome: <input type="text" name="nome" value="<?php echo $nome ?>">
            <span class="obrigatorio">*<?php echo $nomeErro ?></span>
            <br>
            Email: <input type="text" name="email" value="<?php echo $email ?>">
            <span class="obrigatorio">*<?php echo $emailErro ?></span>
            <br>
            Telefone: <input type="text" name="telefone" value="<?php echo $telefone ?>">
            <span class="obrigatorio">*<?php echo $telefoneErro ?></span>
            <br>
            Senha: <input type="password" name="senha" value="<?php echo $senha ?>">
            <span class="obrigatorio">*<?php echo $senhaErro ?></span>
            <br>
            <input type="checkbox" name="administrador">Administrador
            <br>
            <input type="file" name="image">
            <br>
            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
</body>

</html>