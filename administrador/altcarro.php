<?php
    include "../include/MySql.php";
    
$codigo="";  
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

    

    if (isset($_GET['id'])){
        $codigo = $_GET['id'];
        $sql = $pdo->prepare("SELECT * FROM carros WHERE codCarro = ?");
        if ($sql->execute(array($codigo))){
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($info as $key => $dados){
                $codigo = $dados['codCarro'];                    
                $marca = $dados['marca'];
                $nome = $dados['nome'];
                $modelo = $dados['modelo'];
                $preco =  $dados['preco'];
                $ano =  $dados['ano'];
                $cambio =  $dados['cambio'];
                $portas =  $dados['portas'];
                $combustivel =  $dados['combustivel'];
                $kilometragem =  $dados['kilometragem'];
                $placa = $dados['placa'];
                $cor =  $dados['cor'];
                $imgContent = $dados['imagem'];
           
            }
        }
    }


    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
       
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
       


        if (!empty($_FILES["image"]["name"])){    
            //Pegar informações do arquivo
            $fileName = basename($_FILES['image']['name']);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            //Array de extensoes permitidas
            $allowTypes = array('jpg','png','jpeg','gif');
            if (in_array($fileType, $allowTypes)){
                $image = $_FILES['image']['tmp_name'];
                $imgContent = file_get_contents($image);
            } else {
                $msgErro = "Somente arquivos JPG, JPEG, PNG e GIFF são permitidos";
            }     
        }   

        if ($modelo && $nome ) {
            //Verificar se ja existe o modelo já existe
            $sql = $pdo->prepare("SELECT * FROM carros WHERE modelo = ? AND codCarro <> ?");
            if ($sql->execute(array($modelo, $codigo))){
                if ($sql->rowCount() <= 0){
                    $sql = $pdo->prepare("UPDATE carros SET codCarro=?, 
                                                             marca=?, 
                                                             nome=?, 
                                                             modelo=?, 
                                                             preco=?,
                                                             ano=?,
                                                             cambio=?,
                                                             portas=?,
                                                             combustivel=?,
                                                             kilometragem=?,
                                                             placa=?,
                                                             cor=?,
                                                             imagem=?,
                                                       WHERE codCarro=?");

                    if ($sql->execute(array($codigo, $marca, $nome, $modelo, $preco, $ano, $cambio, $portas, $combustivel, $kilometragem, $placa, $cor, $imgContent, $codigo))){
                        $msgErro = "Dados alterados com sucesso!";
                        header('location:listCarro.php');
                    } else {
                        $msgErro = "Dados não cadastrados!";
                    }  
                } else {
                    $msgErro = "já cadastrado!!";
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
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>
<body>
    <div style="display: flex; justify-content:center">
<form method="POST" enctype="multipart/form-data" >
    <fieldset style="display: flex; flex-direction: column; width:200px;">
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
        <input type="file" name="imagem">
        <br>
        <input type="submit" value="Salvar" name="submit">
    </fieldset>
</form>
</div>
</body>
</html>