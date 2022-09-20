<?php
include "componentes/nav.php"
?>
<br>
<div class="container">


    <h1 class="words">Selecione um veículo</label></h1>

    <select>
        <option class="fonte" selected="" disabled="disabled"="">Modelo</option>
        <option class="fonte">Koenigsegg Agera</option>
        <option class="fonte">Koenigsegg Jesko</option>
        <option class="fonte">BMW 7 series</option>
        <option class="fonte">BMW E3</option>
        <option class="fonte">Lamborghini Aventador</option>
        <option class="fonte">Lamborghini Urus</option>
        <option class="fonte">Mustang GT</option>
        <option class="fonte">Ford Mustang March1 Classic</option>
        <option class="fonte">McLaren Coúpe</option>
        <option class="fonte">McLaren 720S</option>
        <option class="fonte">Nissan GT-R 2020</option>
        <option class="fonte">Nissan GT-R Nismo GT500 2017</option>
        <option class="fonte">Bugatti Divo</option>
        <option class="fonte">Buggati La Voiture</option>
        <option class="fonte">Ferrari 488</option>
        <option class="fonte">Ferrari Modena</option>
        <option class="fonte">Toyota Supre A80</option>
        <option class="fonte">Toyota Supra US 2020</option>
    </select>
    <br>
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
<div class="tamanho">
    <input type="checkbox" id="checkbox_cbf6" style="   
    height: 100px;
    width: 100px;
    margin-top: -32px;">

    <label for="checkbox_cbf6">Eu aceito receber informações da Clawer Automóveis e seus parceiros/concessionárias,
        pelos meios de comunicação informados por mim acima, para divulgação de Ofertas, Anúncios de produtos e serviços,
        Clawer e ações de tal em sua Rede de concessionárias.</label>
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