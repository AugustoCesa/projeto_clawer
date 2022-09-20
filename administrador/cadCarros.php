<?php
include "../include/MySql.php";

$marca = "";
$nome = "";
$modelo = "";
$preco = "";
$ano = "";
$cambio = "";
$portas = "";
$combustivel = "";
$kilometragem = "";
$placa = "";
$cor = "";
$categoria = "";

$marcaErro = "";
$nomeErro = "";
$modeloErro = "";
$precoErro = "";
$anoErro = "";
$cambioErro = "";
$portasErro = "";
$combustivelErro = "";
$kilometragemErro = "";
$placaErro = "";
$corErro = "";
$categoriaErro = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    if (!empty($_FILES['image1']["name"])) {
        //Pegar informações do arquivo
        $fileName = basename($_FILES['image1']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        //Array de extensoes permitidas
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image1']['tmp_name'];
            $imgContent1 = file_get_contents($image);

            /////////////////////////////////////////////////////////

            if (!empty($_FILES['image2']["name"])) {
                //Pegar informações do arquivo
                $fileName = basename($_FILES['image2']['name']);
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                //Array de extensoes permitidas
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

                if (in_array($fileType, $allowTypes)) {
                    $image = $_FILES['image2']['tmp_name'];
                    $imgContent2 = file_get_contents($image);

                    /////////////////////////////////////////////////////////////////////////


                    if (!empty($_FILES['image3']["name"])) {
                        //Pegar informações do arquivo
                        $fileName = basename($_FILES['image3']['name']);
                        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                        //Array de extensoes permitidas
                        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

                        if (in_array($fileType, $allowTypes)) {
                            $image = $_FILES['image3']['tmp_name'];
                            $imgContent3 = file_get_contents($image);

                            ///////////////////////////////////////////////////////////////////////////////////



                            if (!empty($_FILES['image4']["name"])) {
                                //Pegar informações do arquivo
                                $fileName = basename($_FILES['image4']['name']);
                                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                                //Array de extensoes permitidas
                                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

                                if (in_array($fileType, $allowTypes)) {
                                    $image = $_FILES['image4']['tmp_name'];
                                    $imgContent4 = file_get_contents($image);

                                    /////////////////////////////////////////////////////////////////////


                                    if (!empty($_FILES['image5']["name"])) {
                                        //Pegar informações do arquivo
                                        $fileName = basename($_FILES['image5']['name']);
                                        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                                        //Array de extensoes permitidas
                                        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

                                        if (in_array($fileType, $allowTypes)) {
                                            $image = $_FILES['image5']['tmp_name'];
                                            $imgContent5 = file_get_contents($image);







                                            if (empty($_POST['marca']))
                                                $marcaErro = "Marca é obrigatório!";
                                            else
                                                $marca = $_POST['marca'];

                                            if (empty($_POST['nome']))
                                                $nomeErro = "Nome é obrigatório!";
                                            else
                                                $nome = $_POST['nome'];

                                            if (empty($_POST['modelo']))
                                                $modeloErro = "Modelo é obrigatório!";
                                            else
                                                $modelo = $_POST['modelo'];

                                            if (empty($_POST['preco']))
                                                $precoErro = "preço é obrigatório!";
                                            else
                                                $preco = $_POST['preco'];

                                            if (empty($_POST['ano']))
                                                $anoErro = "ano é obrigatório!";
                                            else
                                                $ano = $_POST['ano'];

                                            if (empty($_POST['cambio']))
                                                $precoErro = "Cambio é obrigatório!";
                                            else
                                                $cambio = $_POST['cambio'];

                                            if (empty($_POST['portas']))
                                                $portasErro = "Portas é obrigatório!";
                                            else
                                                $portas = $_POST['portas'];

                                            if (empty($_POST['combustivel']))
                                                $combustivelErro = "preço é obrigatório!";
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

                                            if (empty($_POST['categoria']))
                                                $categoriaErro = "categoria é obrigatório";
                                            else
                                                $categoria = $_POST['categoria'];


                                            if ($kilometragem && $modelo) {
                                                //Verificar se ja existe o carro
                                                $sql = $pdo->prepare("SELECT * FROM carros WHERE modelo = ?");
                                                if ($sql->execute(array($modelo))) {
                                                    if ($sql->rowCount() <= 0) {
                                                        $sql = $pdo->prepare("INSERT INTO carros (codCarro, marca, nome, modelo, preco, ano, cambio, portas, combustivel, kilometragem, placa, cor, imagem1, imagem2, imagem3, imagem4, imagem5, categoria)
                                                VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                                        if ($sql->execute(array($marca, $nome, $modelo, $preco, $ano, $cambio, $portas, $combustivel, $kilometragem, $placa, $cor, $imgContent1, $imgContent2, $imgContent3, $imgContent4, $imgContent5, $categoria))) {
                                                            $msgErro = "Dados cadastrados com sucesso!";
                                                            $nome = "";
                                                            $modelo = "";
                                                            $preco = "";
                                                            $ano = "";
                                                            $cambio = "";
                                                            $portas = "";
                                                            $combustivel = "";
                                                            $kilometragem = "";
                                                            $placa = "";
                                                            $cor = "";
                                                            $categoria = "";
                                                            header('location:listCarro.php');
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
                                        } else {
                                            $msgErro = "Somente arquivos JPG, JPEG, PNG e GIFF são permitidos";
                                        }
                                    } else {
                                        $msgErro = "Imagem não selecionada!!";
                                    }
                                } else {
                                    $msgErro = "Imagem não selecionada!!";
                                }
                            } else {
                                $msgErro = "Imagem não selecionada!!";
                            }
                        } else {
                            $msgErro = "Imagem não selecionada!!";
                        }
                    }
                }
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Carros</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>

<body>

    <div style="display:flex; justify-content:center">
        <form method="POST" enctype="multipart/form-data">
            <fieldset style="display: flex; flex-direction: column;">
                <legend>Cadastro de Carro</legend>

                Marca: <input type="text" name="marca" value="<?php echo $marca ?>">
                <span class="obrigatorio">*<?php echo $marcaErro ?></span>
                <br>
                Nome: <input type="text" name="nome" value="<?php echo $nome ?>">
                <span class="obrigatorio">*<?php echo $nomeErro ?></span>
                <br>
                Modelo: <input type="text" name="modelo" value="<?php echo $modelo ?>">
                <span class="obrigatorio">*<?php echo $modeloErro ?></span>
                <br>
                Preço: <input type="text" name="preco" value="<?php echo $preco ?>">
                <span class="obrigatorio">*<?php echo $precoErro ?></span>
                <br>
                Ano: <input type="text" name="ano" value="<?php echo $ano ?>">
                <span class="obrigatorio">*<?php echo $anoErro ?></span>
                <br>
                Cambio: <input type="text" name="cambio" value="<?php echo $cambio ?>">
                <span class="obrigatorio">*<?php echo $cambioErro ?></span>
                <br>
                Portas: <input type="text" name="portas" value="<?php echo $portas ?>">
                <span class="obrigatorio">*<?php echo $portasErro ?></span>
                <br>
                Combustivel: <input type="text" name="combustivel" value="<?php echo $combustivel ?>">
                <span class="obrigatorio">*<?php echo $combustivelErro ?></span>
                <br>
                kilometragem: <input type="text" name="kilometragem" value="<?php echo $kilometragem ?>">
                <span class="obrigatorio">*<?php echo $kilometragemErro ?></span>
                <br>
                Placa: <input type="text" name="placa" value="<?php echo $placa ?>">
                <span class="obrigatorio">*<?php echo $placaErro ?></span>
                <br>
                Cor: <input type="text" name="cor" value="<?php echo $cor ?>">
                <span class="obrigatorio">*<?php echo $corErro ?></span>

                Categoria: <input type="text" name="categoria" value="<?php echo $categoria ?>">
                <span class="obrigatorio">*<?php echo $categoriaErro ?></span>

                <input type="file" name="image1">

                <input type="file" name="image2">

                <input type="file" name="image3">

                <input type="file" name="image4">

                <input type="file" name="image5">

                <br>
                <input type="submit" value="Salvar" name="submit">
            </fieldset>
        </form>
    </div>

</body>


</html>