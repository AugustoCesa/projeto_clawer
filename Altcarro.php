<?php
include "include/MySql.php";

$CodCarro = "";
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
$imagem = "";

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
$modeloErro = "";
$imagemErro = "";
$msgErro = "";
if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $sql = $pdo->prepare("SELECT * FROM carros WHERE CodCarro = ?");
    if ($sql->execute(array($CodCarro))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $value) {
            $CodCarro = $value['codigo'];
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
        $precoErro = "preço é obrigatório!";
    else
        $preco = $_POST['preco'];
    if (empty($_POST['ano']))
        $anoErro = "ano é obrigatório!";
    else
        $ano = $_POST['ano'];
    if (empty($_POST['cambio']))
        $cambioErro = "cambio é obrigatório!";
    else
        $ano = $_POST['ano'];
    if (empty($_POST['portas']))
        $portaErro = "Portas é obrigatório!";
    else
        $portas = $_POST['portas'];
    if (empty($_POST['combustivel']))
        $combustivelErro = "combustivel é obrigatório!";
    else
        $combustivel = $_POST['combustivel'];
    if (empty($_POST['kilometragem']))
        $kilometragemErro = "kilometragem é obrigatório!";
    else
        $kilometragem = $_POST['kilometragem'];
    if (empty($_POST['placa']))
        $placaErro = "placa é obrigatório!";
    else
        $placa = $_POST['placa'];
    if (empty($_POST['cor']))
        $corErro = "cor é obrigatório!";
    else
        $cor = $_POST['cor'];
    if (empty($_POST['modelo']))
        $modeloErro = "modelo é obrigatório!";
    else
        $modelo = $_POST['modelo'];

    if (!empty($_FILES["image"]["name"])) {
        //Pegar informações do arquivo
        $fileName = basename($_FILES['image']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        //Array de extensoes permitidas
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imagem = file_get_contents($image);
        } else {
            $msgErro = "Somente arquivos JPG, JPEG, PNG e GIFF são permitidos";
        }
    }

    if ($marca && $nome && $preco && $ano) {
        //Verificar se ja existe o modelo
        $sql = $pdo->prepare("SELECT * FROM carros WHERE modelo = ? AND CodCarro <> ?");
        if ($sql->execute(array($modelo, $CodCarro))) {
            if ($sql->rowCount() <= 0) {
                $sql = $pdo->prepare("UPDATE carros SET codigo=?, 
                                                             marca=?, 
                                                             nome=?, 
                                                             preco=?, 
                                                             ano=?,
                                                             portas=?,
                                                             combustivel=?,
                                                             kilometragem=?,
                                                             placa=?,
                                                             cor=?,
                                                             modelo=?,
                                                             imagem=?,
                                                       WHERE codigo=?");

                if ($sql->execute(array($CodCarro, $marca, $nome, $preco, $ano, $portas, $combustivel, $kilometragem, $placa, $cor, $modelo,$imagem,))) {
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
    <title>Alterar cadastro de carro</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Alterar cadastro do carro</legend>

            marca: <input type="text" name="marca" value="<?php echo $marca ?>">
            <span class="obrigatorio">*<?php echo $marcaErro ?></span>
            <br>
            nome: <input type="text" name="nome" value="<?php echo $nome ?>">
            <span class="obrigatorio">*<?php echo $nomeErro ?></span>
            <br>
            preco: <input type="text" name="preco" value="<?php echo $preco ?>">
            <span class="obrigatorio">*<?php echo $precoErro ?></span>
            <br>
            ano: <input type="text" name="ano" value="<?php echo $ano ?>">
            <span class="obrigatorio">*<?php echo $anoErro ?></span>
            <br>
            cambio: <input type="text" name="cambio" value="<?php echo $cambio ?>">
            <span class="obrigatorio">*<?php echo $cambioErro ?></span>
            <br>
            portas: <input type="text" name="portas" value="<?php echo $portas ?>">
            <span class="obrigatorio">*<?php echo $portasErro ?></span>
            <br>
            combustivel: <input type="text" name="senha" value="<?php echo $combustivel ?>">
            <span class="obrigatorio">*<?php echo $combustivelErro ?></span>
            <br>
            kilometragem: <input type="text" name="kilometragem" value="<?php echo $kilometragem ?>">
            <span class="obrigatorio">*<?php echo $kilometragemErro ?></span>
            <br>
            placa: <input type="text" name="placa" value="<?php echo $placa ?>">
            <span class="obrigatorio">*<?php echo $placaErro ?></span>
            <br>
            cor: <input type="text" name="cor" value="<?php echo $cor ?>">
            <span class="obrigatorio">*<?php echo $corErro ?></span>
            <br>
            modelo: <input type="text" name="modelo" value="<?php echo $modelo ?>">
            <span class="obrigatorio">*<?php echo $modeloErro ?></span>
            <br>
            <input type="file" name="imagem">
            <br>
            <input type="submit" value="Salvar" name="submit">
        </fieldset>
    </form>
    <span><?php echo $msgErro ?></span>
</body>

</html>