<?php
include "include/conBusca.php";
include "componentes/nav.php"

?>


<h3 style=" width:100%; font-family:'Bebas Neue'; color:white; margin:20px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Resultados para: <?php print $_GET['busca'] ?></h3>


<br>

<div class="container" style="display: flex; justify-content:space-evenly; ">



    <?php
    if (!isset($_GET['busca'])) {
    ?>
        <tr>
            <td colspan="4">digite algo para pesquisar...</td>
        </tr>
        <?php
    } else {
        $pesquisa =  $mysqli->real_escape_string($_GET['busca']);
        $sql_code = "SELECT * FROM carros 
WHERE marca LIKE '%$pesquisa%' 
OR modelo LIKE '%$pesquisa%' 
OR nome LIKE '%$pesquisa%' 
OR preco LIKE '%$pesquisa%'
OR categoria LIKE '%$pesquisa%'";

        $sql_query = $mysqli->query($sql_code) or die("Erro ao consultar" . $mysqli->error);

        if ($sql_query->num_rows == 0) {
        ?>



            <p colspan="4" style="color: white; font-size:40px">Nenhum resultado encontrado </p>


        <?php
        } else {
        ?>
            <div class="container py-5">
                <div class="row mt-3">
                    <!-- Your loop code goes here within the container -->
                    <?php
                    if (mysqli_num_rows($sql_query) > 0) {
                        foreach ($sql_query as $dados) {
                            /*Card display code goes here*/
                    ?>
                            <div class="container resultado" style=" border:solid white 10px;display: flex; flex-direction: column; margin-top: 100px; font-size:22px; background-color:white; width: 300px; height: 470px; border-radius: 8px;">

                                <img style="width:240px; border-radius:11px" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($dados['imagem']) ?>" class="img-fluid">
                                <p><strong> Marca: <?php echo $dados['marca']; ?></Strong></p>
                                <div class="model" style="display: flex;">

                                    <small>
                                        <p><?php echo $dados['nome']; ?>/</p>
                                    </small>
                                    <small>
                                        <p><?php echo $dados['modelo']; ?></p>
                                    </small>



                                </div>
                                <strong>
                                    <p><?php echo $dados['categoria'] ?></p>
                                </strong>
                                <p style="font-size: 29px;"><strong><?php echo $dados['preco']; ?></strong></p>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No record found";
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    <?php
    }
    ?>

</div>


<div class="fot" style="margin-top: 300px">
    <?php include "componentes/footer.php" ?>
</div>