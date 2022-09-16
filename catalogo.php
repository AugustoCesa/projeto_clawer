<?php include "componentes/nav.php"; ?>
<?php
$strcon = mysqli_connect('localhost', 'root', '', 'projeto') or die("Erro ao conectar o banco");
$sql = "SELECT * FROM CARROS";
$resultado = mysqli_query($strcon, $sql) or die('Erro ao consultar o catálgo');

if(mysqli_num_rows($resultado) > 0){

while ($produtos = mysqli_fetch_array($resultado)) {


    $nome = $produtos['nome'];

    $modelo = $produtos['modelo'];

    $marca = $produtos['marca'];

    $preco = $produtos['preco'];

    $categoria = $produtos['categoria'];

    $imagem = $produtos['imagem']
?>

    <div class="container py-5">
        <div class="row mt-3">


            <div class="container resultado" style=" border:solid white 10px;display: flex; flex-direction: column; margin-top: 100px; font-size:22px; background-color:white; width: 300px; height: 470px; border-radius: 8px;">
                
                    <img style="width:240px; border-radius:11px" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($imagem) ?>" class="img-fluid">
                    <p><strong> Marca: <?php echo $marca; ?></Strong></p>
                    <div class="model" style="display: flex;">

                        <small>
                            <p><?php echo $nome ?></p>
                        </small>
                        <small>
                            <p><?php echo $modelo; ?></p>
                        </small>



                    </div>
                    <strong>
                        <p><?php echo $categoria ?></p>
                    </strong>
                    <p style="font-size: 29px;"><strong><?php echo $preco; ?></strong></p>
                
            </div>


        </div>

    <?php

}
}else{
    echo "Sem conteudo";
}


    ?>
    <?php include "componentes/footer.php" ?>