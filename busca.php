<?php
include "include/conBusca.php";
include "componentes/nav.php";
?>





<h4 style=" width:100%; font-family:'Bebas Neue'; color:white; margin:20px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Resultados para: <?php print $_GET['busca'] ?></h4>


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



            <p colspan="4" style="color: white; font-size:40px; font-family:'Franklin Gothic Medium', 'Arial Narrow'">Nenhum resultado encontrado. </p>


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
                    <style>
a{
    text-decoration: none;
    color: white;
}

body, html {
overflow-x: hidden !important;
}
                    </style>

                            <div class="container resultado" style=" border:solid #0C2A43 10px;display: flex; flex-direction: column; margin-top: 100px; font-size:22px; background-color:#0C2A43; width: 300px; height: 470px; border-radius: 8px; color:white">
                                <?php echo "<a href='carro.php?id=" . $dados['CodCarro'] . "' >"; ?>

                                <img style="width:240px; border-radius:11px" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($dados['imagem1']) ?>" class="img-fluid">
                                <p><strong><?php echo $dados['nome'];?>/<?php echo $dados['modelo']; ?></Strong></p>
                                <div class="model" style="display: flex;">
                                    
                                    <small>
                                        <p><?php echo $dados['marca']; ?></p>
                                    </small>
                                   



                                </div>
                                <strong>
                                    <p><?php echo $dados['categoria'] ?></p>
                                </strong>
                                <p style="font-size: 29px;"><strong><?php echo $dados['preco']; ?></strong></p>
                                </a>

                            </div>
                    <?php
                            "</a>";
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
</table>

<div class="fot" style="margin-top: 300px">
    <?php include "componentes/footer.php" ?>
</div>