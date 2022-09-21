<?php
    include "nav.php";
?>
        <style>
        .small-img-group{
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
        .info hr{
            color:black;
            height: 4px;
        }

    </style>

    <section class="container sproduct my-5 pt-2">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-12 col-12">
                <img class="img-fluid w-100 pb-2 border border-4 border-dark" style="border-radius: 20px;"
                    src="./images/MicrosoftTeams-image (8).png" id="MainImg" alt="">

                <div class="small-img-group pt-2">
                    <div class="small-img-col border border-4 border-dark">
                        <img class="small-img img-fluid" src="./images/MicrosoftTeams-image (8).png" width="150px"
                            alt="">
                    </div>
                    <div class="small-img-col border border-4 border-dark">
                        <img class="small-img img-fluid" src="./images/MicrosoftTeams-image (10).png" width="150px"
                            alt="">
                    </div>
                    <div class="small-img-col border border-4 border-dark">
                        <img class="small-img img-fluid " src="./images/MicrosoftTeams-image (11).png" width="150px" alt="">
                    </div>
                    <div class="small-img-col border border-4 border-dark">
                        <img class="small-img img-fluid" src="./images/MicrosoftTeams-image (9).png" width="150px" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-12">
                <div class="dados">
                    <h3>Lamborguini Urus 2018</h3>
                    
                    <h1>R$8.000.000,00</h1>
                    <button type="button"  href="#" class="btn btn-success">Comprar</button> 
                </div>
            </div>
        </div>
        <hr>
        <div class="descricao">
            <h2>Descrição</h2>

            <p>O Urus é definido pela própria Lamborghini não como um SUV, mas sim um “Super SUV”. um modelo capaz de conciliar incursões mais aventureiras, fora de estrada, 
                com outras não menos desprovidas de adrenalina, mas na estrada… As credenciais são dignas de respeito: 0 a 100 km/h em 3,6 segundos; 0 -200 km/h em 12,8 segundos;
                velocidade máxima de 305 km/h. Tudo isto cortesia de um V8 biturbo em alumínio, de 4 litros a gasolina, montado à frente e capaz de debitar 650 cv e 850 Nm – o que, 
                feitas as contas, dá qualquer coisa como uma potência específica de 162,7 cv por litro. E, como sobre a balança, o ponteiro acusa menos de 2.200 kg, 
                este “toiro” pode orgulhar-se de ser o SUV com a melhor relação peso/potência: 3,38 kg/cv.
                Conta com vários modos de condução. Aos modos Estrada, Terra e Neve soma o Sport e, ainda, o Corsa e Sabbia (areia), além de um modo personalizado, chamado Ego.
                Qualquer um deles acionável no seletor que se encontra bem ao centro, mesmo à mão do condutor. 
                Custa em Portugal 296 mil euros.</p>
            </div>
        <hr>
            <div class="col-lg-5 col-md-12 col-12">
                <h2>Informações do veiculo</h2>
                <div class="info" style="font-size: 15px;">
                    <ul>
                        <hr>
                        <li><p><b>Marca</b></p>
                        <p>Lamborguini</p></li>
                        <hr>
                        <li><h4>Modelo</h4></li>
                        <p>Urus</p>
                        <hr>
                        <li><h4>Ano</h4></li>
                        <p>2018</p>
                        <hr>
                        <li><h4>Cambio</h4></li>
                        <p>Automatico</p>
                        <hr>
                        <li><h4>Portas</h4></li>
                        <p>4</p>
                        <hr>
                        <li><h4>Combustivel</h4></li>
                        <p>Gasolina</p>
                        <hr>
                        <li><h4>KM</h4></li>
                        <p>0</p>
                        <hr>
                        <li><h4>Placa</h4></li>
                        <p>******9</p>
                        <hr>                  
                    </ul>
                </div>
            </div>   
        </section>
            






   <?php
    include "footer.php";
   ?>

    <script>
        var MainImg = document.getElementById('MainImg');
        var smallimg = document.getElementsByClassName('small-img');

        smallimg[0].onclick = function () {
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function () {
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function () {
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function () {
            MainImg.src = smallimg[3].src;
        }



    </script>

</body>

</html>