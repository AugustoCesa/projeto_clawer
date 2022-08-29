<?php
include "../include/conBusca.php";
include "../componentes/nav.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>busca</title>
    <link href="../assets/css/estilo.css" rel="stylesheet">
</head>

<body>

    <h3 style=" width:100%; font-family:'Bebas Neue'; color:white; margin:20px">Resultados para: <?php print $_GET['busca'] ?></h3>


    <br>

    <div style="display: flex; justify-content:space-evenly; ">



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
OR preco LIKE '%$pesquisa%'";

            $sql_query = $mysqli->query($sql_code) or die("Erro ao consultar" . $mysqli->error);

            if ($sql_query->num_rows == 0) {
            ?>


                <tr>
                    <td colspan="4">Nenhum resultado encontrado</td>
                </tr>

                <?php
            } else {

                while ($dados = $sql_query->fetch_assoc()) {
                ?>
                    <div class="resultado" style=" border:solid white 10px;display: flex; flex-direction: column; margin-top: 100px; font-size:22px; background-color:white; width: 280px; height: 190px; border-radius: 10px;">
                        <p><strong> Marca: <?php echo $dados['marca']; ?></Strong></p>

                        <div class="model" style="display: flex;">

                           <small> <p><?php echo $dados['nome']; ?>/</p></small>
                           <small><p><?php echo $dados['modelo']; ?></p></small>

                        </div>
                    
                        <p style="font-size: 29px;"><strong><?php echo $dados['preco']; ?></strong></p>
                    </div>

            <?php
                }
            }
            ?>




        <?php
        }
        ?>

    </div>


    <div class="fot" style="margin-top: 150px">
        <?php include "../componentes/footer.php" ?>
    </div>
</body>


</html>