<?php include "componentes/nav.php"; ?>
<?php
$strcon = mysqli_connect('localhost', 'root', '', 'projeto') or die("Erro ao conectar o banco");
$sql = "SELECT * FROM CARROS";
$resultado = mysqli_query($strcon, $sql) or die('Erro ao consultar o catálgo');
?>

<style>

a{
    text-decoration: none;
    color:white;
}

</style>
<div class="container py-5">
    <div class="row mt-3">
        <?php
        if (mysqli_num_rows($resultado) > 0) {

            while ($produtos = mysqli_fetch_array($resultado)) {

                $codigo = $produtos['CodCarro'];

                $nome = $produtos['nome'];

                $modelo = $produtos['modelo'];

                $marca = $produtos['marca'];

                $preco = $produtos['preco'];

                $categoria = $produtos['categoria'];

                $imagem1 = $produtos['imagem1'];


        ?>


                <div class="container_catalogo" style=" border:solid #0C2A43 12px; margin-top: 50px; font-size:22px; background-color:#0C2A43; width: 300px; height: 450px; border-radius: 8px; margin-left:15px;; margin-right: 15px;">
              
                       
            <img style="width:240px; border-radius:11px" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($imagem1) ?>" class="img-fluid">
                    
            
            <?php echo "<a href='carro.php?id=" . $produtos['CodCarro'] . "' "; ?>
            
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
                    </a>
                </div>


            <?php

            }
            ?>
    </div>
</div>
<?php
        } else {
            echo "Sem conteudo";
        }

        include "componentes/footer.php" ?>