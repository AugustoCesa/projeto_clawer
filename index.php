<?php
include 'componentes/nav.php'
?>



<div style="display: flex; flex-direction: row; align-items: center; justify-content:space-between; margin-left:10px"  >
<?php if (isset($_SESSION['nome'])){?>

  <?php } else {?>
    <h1 style=" margin-left:5px;color:white; font-size:12px" >Você não esta logado, faça o login para acessar todas as funcionalidades do site!</h1>

    <?php } ?>
</div>
<main style="margin-top:130px ">

  <div id="carouselExampleDark" style="width: 100%; display:flex; justify-content:center" class="carousel carousel-dark slide text-center" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner" style="border-radius: 20px; width:1000px; border:solid #0C2A43 6px; ">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="assets/images/chiron.png" style="height: 600px; width:100%" class="d-block w-100 img-fluid" alt="..." class="img-fluid" alt="imagem do carrossel">

        <div class="carousel-caption d-none d-md-block">
          <h5 style="color: white;">Quer comprar um carro novo?</h5>
          <p style="color: white;">Conte com a gente!</p>
         <a href="catalogo.php"> <button  href="catalogo.php"  class="btn main-btn" style="background-color:#0C2A43; color:white;">Saiba mais</button></a>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">

        <img src="assets/images/jesko.png" style="height: 600px; width:100%" class="d-block w-100" alt="imagem do carrossel">

        <div class="carousel-caption d-none d-md-block">
          <h5 style="color: white;">Ou quer alugar um carro?</h5>
          <p style="color: white;">Pra sua sorte, nós tambem alugamos</p>
       <a href="alugar.php"><button class="btn main-btn" style="background-color:#0C2A43; color:white;">Saiba mais</button></a>
        </div>
      </div>
      <div class="carousel-item">

        <img src="assets/images/hellcat.png" style="height: 600px; width:100%" class="d-block w-100" alt="imagem do carrossel">

        <div class="carousel-caption d-none d-md-block">
          <h5 style="color: white;">Marque um teste drive aqui</h5>
          <p style="color: white;">Mas faça o seu cadastro</p>
         <a href="catalogo.php"><button class="btn main-btn" style="background-color:#0C2A43; color:white;">Saiba mais</button></a>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" style="width: 25%;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" style="width:30%;" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" style="width:25%;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" style="width:30%;" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

   <div class="promoção" style="display: flex; justify-content:center">
<h2 style="margin-top: 60px; align-items:center; text-align:center; color:white; border:#0C2A43 solid 2px; border-radius: 10px; width:400px; height:60px; background-color:#0C2A43">Destaque:</h2>
    </div>

    <?php
$strcon = mysqli_connect('localhost', 'root', '', 'projeto') or die("Erro ao conectar o banco");
$sql = "SELECT * FROM CARROS";
$resultado = mysqli_query($strcon, $sql) or die('Erro ao consultar o catálgo');
?>

<style>
    a {
        text-decoration: none;
        color: white;
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
                    <p><strong><?php echo $nome ?></Strong></p>

                    <div class="model" style="display: flex;">

                        <small>
                            <p><?php echo $marca; ?>/<?php echo $modelo; ?></p>
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
            echo "<p style: color: white text-align:center>Sem conteudo </p>";
        }


?>

  
</main>





<?php
include 'componentes/footer.php'
?>


