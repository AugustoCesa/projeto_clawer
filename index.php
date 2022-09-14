<?php
include 'componentes/nav.php'
?>

<?php
  session_start();
?>

<div style="display: flex; flex-direction: row; align-items: center; justify-content:space-between; margin-left:10px"  >
<?php if (isset($_SESSION['nome'])){?>

   <div style="margin-top:8px"> <p style="font-size:20px; margin-right:10px; color:white; background-color: #0C2A43; border-radius:10px">Olá <?php echo $_SESSION['nome']?>!!</p></div>
    
    <p style="font-size:15px; color:white; background-color:#0C2A43; border-radius:8px; margin-right:10px "><a style="text-decoration:none; color:white;  " href="logout.php">Logout</a></p>
  <?php } else {?>
    <h1 style=" margin-left:5px;color:white; font-size:12px" >Você não esta logado, faça o login para acessar todas as funcionalidades do site!</h1>

    <?php } ?>
</div>
<main style="margin:20px; ">

  <div id="carouselExampleDark" style="width: 100%; display:flex; justify-content:center" class="carousel carousel-dark slide text-center" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner" style="border-radius: 20px; width:1000px; border:solid #0C2A43 6px; ">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="assets/images/chiron.png" style="height: 600px; width:100%" class="d-block w-100 img-fluid" alt="...">

        <div class="carousel-caption d-none d-md-block">
          <h5 style="color: white;">Quer comprar um carro novo?</h5>
          <p style="color: white;">Conte com a gente!</p>
          <button class="btn main-btn" style="background-color:#0C2A43; color:white;">Saiba mais</button>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">

        <img src="assets/images/jesko.png" style="height: 600px; width:100%" class="d-block w-100" alt="...">

        <div class="carousel-caption d-none d-md-block">
          <h5 style="color: white;">Ou quer alugar um carro?</h5>
          <p style="color: white;">Pra sua sorte, nós tambem alugamos</p>
          <button class="btn main-btn" style="background-color:#0C2A43; color:white;">Saiba mais</button>
        </div>
      </div>
      <div class="carousel-item">

        <img src="assets/images/hellcat.png" style="height: 600px; width:100%" class="d-block w-100" alt="...">

        <div class="carousel-caption d-none d-md-block">
          <h5 style="color: white;">Marque um teste drive aqui</h5>
          <p style="color: white;">Mas faça o seu cadastro</p>
          <button class="btn main-btn" style="background-color:#0C2A43; color:white;">Saiba mais</button>
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

    <h2 style="margin-top: 60px; align-items:center; text-align:center; color:white; border:#0C2A43 solid 2px; border-radius: 10px; width:400px; height:60px; background-color:#0C2A43">Promoções especiais:</h2>

  </div>
</main>





<?php
include 'componentes/footer.php'
?>


