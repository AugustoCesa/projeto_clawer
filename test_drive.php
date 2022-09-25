<?php
include "componentes/nav.php"
?>
<br>
<div class="container">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilllo.css">
</head>
<body>
    
</body>
</html>

    <h1 class="words">Selecione um veículo</label></h1>

    <select>
        <option class="fonte" selected="" disabled="disabled">Modelo</option>
        <option class="fonte">Koenigsegg Agera</option>
    </select>
    <br>
    
    <h2 class="words">Nome Completo</h2>
    <input type="text" id="textfield_a1ad" placeholder="Nome">
    <br>
    <br>
    <h2 class="words">Telefone</h2>
    <input type="tel" id="textfield_a1ad" placeholder="9999999999999">
    <br>
    <br>
    <h2 class="words">Email</h2>
    <input type="email" id="textfield_a1ad" placeholder="@gmail.com">
    <br>
    <br>
    <h2 class="words">CPF</h2>
    <input type="number" id="textfield_a1ad" placeholder="155.759.324-34">
    <br>
    <br>
    <h2 class="words">Escolha uma concessionária</h2>
    <input type="search" id="Location-2" placeholder="Escolha uma cidade">
    <br>

</div>
<br>
<div class="tamanho" style="display: flex;flex-direction:column; text-align:center; margin:20px" >

    <label for="checkbox_cbf6">Eu aceito receber informações da Clawer Automóveis e seus parceiros/concessionárias,
        pelos meios de comunicação informados por mim acima, para divulgação de Ofertas, Anúncios de produtos e serviços,
        Clawer e ações de tal em sua Rede de concessionárias.</label>
        
        <input type="checkbox" id="checkbox_cbf6" style="   
 height: 30px;
 width: 30px;
 margin-left: 50px
 
 ">
</div>
<br>
<div class="container">
    <div class="color">
        <input type="submit" name="enviarSol" value="Enviar" style="
    height: 45px;
    width: 70px;"></input>
    </div>
</div>
<br>
<?php
include "componentes/footer.php"
?>