<?php
include "componentes/nav.php";
$idCarro = 0;
$where = "";
if (isset($_GET['id'])) {
    $idCarro = $_GET['id'];

    $where = "WHERE  CodCarro = $idCarro";
}
$strcon = mysqli_connect('localhost', 'root', '', 'projeto') or die("Erro ao conectar o banco");
$sql = "SELECT * FROM CARROS $where";
$resultado = mysqli_query($strcon, $sql) or die('Erro ao consultar o catálgo');


?>
<style>
    .small-img-group {
        display: flex;
        justify-content: space-between;

    }

    .small-img-col {
        flex-basis: 24%;
        cursor: pointer;
    }

    body {
        background: linear-gradient(#2046b0, #101c66);
        color: white;
    }

    .info hr {
        color: black;
        height: 4px;
    }
</style>
<?php
if (mysqli_num_rows($resultado) > 0) {

    while ($produtos = mysqli_fetch_array($resultado)) {


        $codigo = $produtos['CodCarro'];
        $nome = $produtos['nome'];
        $modelo = $produtos['modelo'];
        $marca = $produtos['marca'];
        $preco = $produtos['preco'];
        $ano = $produtos['ano'];
        $portas = $produtos['portas'];
        $cambio = $produtos['cambio'];
        $kilometragem = $produtos['kilometragem'];
        $combustivel = $produtos['combustivel'];
        $placa = $produtos['placa'];
        $categoria = $produtos['categoria'];
        $imagem1 = $produtos['imagem1'];
        $imagem2 = $produtos['imagem2'];
        $imagem3 = $produtos['imagem3'];
        $imagem4 = $produtos['imagem4'];
        $descricao = $produtos['descricao'];

?>
        <section class="container sproduct my-5 pt-2">
            <div class="row mt-5">
                <div class="col-lg-5 col-md-12 col-12">
                    <img class="img-fluid w-100 pb-2 border border-4 border-dark" style="border-radius: 20px;" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($imagem1) ?>" id="MainImg" alt="">

                    <div class="small-img-group pt-2">
                        <div class="small-img-col border border-4 border-dark">
                            <img class="small-img img-fluid" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($imagem1) ?>" width="150px" alt="">
                        </div>
                        <div class="small-img-col border border-4 border-dark">
                            <img class="small-img img-fluid" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($imagem2) ?>" width="150px" alt="">
                        </div>
                        <div class="small-img-col border border-4 border-dark">
                            <img class="small-img img-fluid " src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($imagem3) ?>" width="150px" alt="">
                        </div>
                        <div class="small-img-col border border-4 border-dark">
                            <img class="small-img img-fluid" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($imagem4) ?>" width="150px" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="dados">
                        <h3> <?php echo $marca . "/" . $nome ?></h3>

                    </div>
                    <div class="descricao">


                        <p>
                            <?php echo $descricao ?>
                        </p>
                    </div>
                    <h2> <?php echo $preco ?></h2>
                    <?php if (mb_strtolower($categoria) == 'comprar') { ?>

                        <button type="button" href="#" class="btn btn-success">Comprar</button>

                    <?php  } else { ?>
                        <button type="button" href="#" class="btn" style="background-color: yellow; color:black;">Alugar</button>
                    <?php } ?>
                </div>
                <hr style="width: 100%; color:black; height:8px">
                <div class="col-lg-5 col-md-12 col-12">
                    <h2>Informações do veiculo</h2>
                    <div class="info" style="font-size: 15px;">
                        <ul>
                            <hr>
                            <li>

                                <h5>Marca</h5>
                            </li>
                            <p><?php echo $marca ?></p>
                            <hr>
                            <li>
                                <h5>Modelo</h5>
                            </li>
                            <p><?php echo $modelo ?></p>
                            <hr>
                            <li>
                                <h5>Ano</h5>
                            </li>
                            <p><?php echo $ano ?></p>
                            <hr>
                            <li>
                                <h5>Cambio</h5>
                            </li>
                            <p><?php echo $cambio ?></p>
                            <hr>
                            <li>
                                <h5>Portas</h5>
                            </li>
                            <p><?php echo $portas ?></p>
                            <hr>
                            <li>
                                <h5>Combustivel</h5>
                            </li>
                            <p><?php echo $combustivel ?></p>
                            <hr>
                            <li>
                                <h5>KM</h5>
                            </li>
                            <p><?php echo $kilometragem ?></p>
                            <hr>
                            <li>
                                <h5>Placa</h5>
                            </li>
                            <p><?php echo $placa ?></p>
                            <hr>
                        </ul>
                    </div>
                </div>
            </div>


        </section>




        <script>
            var MainImg = document.getElementById('MainImg');
            var smallimg = document.getElementsByClassName('small-img');

            smallimg[0].onclick = function() {
                MainImg.src = smallimg[0].src;
            }
            smallimg[1].onclick = function() {
                MainImg.src = smallimg[1].src;
            }
            smallimg[2].onclick = function() {
                MainImg.src = smallimg[2].src;
            }
            smallimg[3].onclick = function() {
                MainImg.src = smallimg[3].src;
            }
        </script>

        </html>
<?php
    }
} else {
    echo "<h1> Nenhum carro encontrado!</h1> ";
}
?>
<?php include 'componentes/footer.php' ?>