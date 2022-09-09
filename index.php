<?php
include "componentes/nav.php"
?>
<div class="container">


    <h1 class="words">Selecione um veículo</label></h1>

    <div class="custom-selectbox select-model" data-lastprlepopulatedvehice="true">

        <select id="models" data-storage-key="" name="targetVehicleModel" data-validation-notblank="Por favor, escolha uma opção válida." data-disable-generic-tracking="true">
            <option selected="" disabled="disabled" value="">Modelo</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">Koenigsegg Agera</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">Koenigsegg Jesko</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">BMW 7 series</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">BMW E3</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">Lamborghini Aventador</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">Lamborghini Urus</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">Mustang GT</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">Ford Mustang March1 Classic</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">McLaren Coúpe</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">McLaren 720S</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">Nissan GT-R 2020</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">Nissan GT-R Nismo GT500 2017</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">Bugatti Divo</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">Buggati La Voiture</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">Ferrari 488</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">Ferrari Modena</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">Toyota Supre A80</option>
            <option value="" data-name-and-path="" data-phase="0" data-year="" data-car-page="" data-extended-test-drive="false">Toyota Supra US 2020</option>
        </select>
    </div>

    <h2 class="words">Nome Completo</h2>
    <input type="text" id="textfield_a1ad" placeholder="Nome">
    <h2 class="words">Telefone</h2>
    <input type="tel" id="textfield_a1ad" placeholder="9999999999999">
    <h2 class="words">Email</h2>
    <input type="email" id="textfield_a1ad" placeholder="@gmail.com">
    <h2 class="words">CPF</h2>
    <input type="number" id="textfield_a1ad" placeholder="000.000.000-00">
    <h2 class="words">Escolha uma concessionária</h2>
    <input type="" id="Location-2" placeholder="Escolha uma cidade">
    

</div>
<br>
<div class="tamanho">
    <input type="checkbox" id="checkbox_cbf6">
    <label for="checkbox_cbf6">Eu aceito receber informações da Clawer Automóveis e seus parceiros/concessionárias,
        pelos meios de comunicação informados por mim acima, para divulgação de Ofertas, Anúncios de produtos e serviços,
        Clawer e ações de tal em sua Rede de concessionárias.</label>
</div>
<?php
include "componentes/footer.php"
?>