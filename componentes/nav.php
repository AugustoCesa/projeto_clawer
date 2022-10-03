<?php 
include 'header.php';
session_start();
?>


<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #0C2A43; z-index: 1" >
  <div class="container-fluid">

    <a class="navbar-brand" href="index.php">
<img src="assets/images/logo.jpg" width="150" alt="logo">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-size:18px;">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="componentes/login.php">Login</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
            Serviços
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="alugar.php">Alugar carro</a></li>
            <li><a class="dropdown-item" href="catalogo.php">Agendar test-drive</a></li>
            <li><a class="dropdown-item" href="catalogo.php">Catálogo</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">lojas</a></li>
          </ul>
        </li>

        

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
            Redes Socias
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="https://www.instagram.com/clawerautomoveisoficial/">Instagram</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="https://twitter.com/compose/tweet">Twitter</a></li>
          </ul>
        </li>

        <?php if ($_SESSION['administrador']==1){?>
        <li class="nav-item">
          <a class="nav-link active" href="administrador/intAdm.php">Administrador</a>
        </li>
        <?php
        }

        
        ?>
       
        
      </ul>
      <form class="d-flex" role="search" action="busca.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="busca">
        <button class="btn btn-outline-success" type="submit" style="color:white; border-color:white">GO</button>
      </form>

     
    </div>
  </div>
</nav>



