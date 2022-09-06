<?php 
include "./include/MySql.php";
include "nav.php";

$sql_code="";
?>
<?php 

$sql_code ="SELECT * FROM carros WHERE imagem"

?>
<section class="container sproduct my-5 pt-5">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-12 col-12">
            <img style="width:80px;" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($dados['imagem'])?>">

                <div class="small-img-group pt-2">
                    <div class="small-img-col border border-4 ">
                        <img class="small-img img-fluid" src="./images/foto2.png" width="100%"
                            alt="">
                    </div>
                    <div class="small-img-col border border-4">
                        <img class="small-img img-fluid" src="./images/MicrosoftTeams-image (7).png" width="100%"
                            alt="">
                    </div>
                    <div class="small-img-col border border-4">
                        <img class="small-img img-fluid " src="./images/foto2.png" width=100% alt="">
                    </div>
                    <div class="small-img-col border border-4">
                        <img class="small-img img-fluid" src="./images/foto1.png" width="100%" alt="">
                    </div>
                </div>
            </div>
            <div class="descricao col-lg-7 col-md-12 col-12">
                <div class="info">
                    <h6>Home / Carros</h6>
                    <h3 class="py-4">Lamborghini Urus 2018</h3>
                    <h2>R$2.400.000,00</h2>
                </div>
                <button type="button"  href="#" class="btn btn-success">Comprar</button>
            </div>
        </div>


    </section>

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

<?php 
include "footer.php";
?>