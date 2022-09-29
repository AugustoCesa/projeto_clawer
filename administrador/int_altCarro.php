
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <style>
            body{
                background-color:#101c66;
                color: white;
                font-family:'Franklin Gothic';
            }
            fieldset{
                border-radius: 10px;

            }
            input .botao{
                border-radius: 10px;
            }
            .titulo ul{
                list-style: none;
                justify-content: space-between;
                display: flex;
                margin: 0 auto;

            }
            .titulo ul img {
                border-radius: 5px;
                padding-top: 10px;
                margin-right: 20px;
            }
            .tabela th{
                color: white;
            }

        </style>
<!--  interface de alteração de informções dos carros   -->
        </head>
        <body>
            <div class="titulo">
            <nav>
                    <ul>
                        <li><h1>Alteração de Cadastro de Carro</h1></li>
                        <li><a href="../index.php"><img src="../assets/images/logo.jpg" alt="Logo do site" width="150"></a></li>
                    </ul>
            </nav>
            <hr>
            </div>
            
    <div class="tabela">
            <?php
include "../include/MySql.php";
// tabela para escolher o carro que vc quer alterar
$sql = $pdo->prepare('SELECT * FROM carros');
if ($sql->execute()) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<table border='2'>";
    echo "<tr>";
    echo "  <th>Código</th>";
    echo "  <th>marca</th>";
    echo "  <th>nome</th>";
    echo "  <th>modelo</th>";
    echo "  <th>ano</th>";
    echo "  <th>cambio</th>";
    echo "  <th>portas</th>";
    echo "  <th>combustivel</th>";
    echo "  <th>kilometragem</th>";
    echo "  <th>placa</th>";
    echo "  <th>cor</th>";
    echo "  <th>preco</th>";
    echo "  <th>imagem1</th>";
    echo "  <th>imagem2</th>";
    echo "  <th>imagem3</th>";
    echo "  <th>imagem4</th>";
    
    
    
    
    
    echo "  <th>alterar</th>";
    echo "  <th>excluir</th>";
    echo "</tr>";
    foreach ($info as $key => $value) {
        echo "<tr>";
        echo "<td>" . $value['CodCarro'] . "</td>";
        echo "<td>" . $value['marca'] . "</td>";
        echo "<td>" . $value['nome'] . "</td>";
        echo "<td>" . $value['modelo'] . "</td>";
        echo "<td>" . $value['ano'] . "</td>";
        echo "<td>" . $value['cambio'] . "</td>";
        echo "<td>" . $value['portas'] . "</td>";
        echo "<td>" . $value['combustivel'] . "</td>";
        echo "<td>" . $value['kilometragem'] . "</td>";
        echo "<td>" . $value['placa'] . "</td>";
        echo "<td>" . $value['cor'] . "</td>";
        echo "<td>" . $value['preco'] . "</td>";
        
        $imagem = $value['imagem1'];
        echo '<td><img style="width:80px;" src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem) . '"></td>';
        
        
        $imagem = $value['imagem2'];
        echo '<td><img style="width:80px;" src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem) . '"></td>';
        
        $imagem = $value['imagem3'];
        echo '<td><img style="width:80px;" src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem) . '"></td>';
        
        $imagem = $value['imagem4'];
        echo '<td><img style="width:80px;" src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem) . '"></td>';
        
        
        echo "<td><center><a href='Altcarro.php?id=" . $value['CodCarro'] . "'>(+)</a></center></td>";
        echo "<td><center><a href='delUsuario.php?id=" . $value['CodCarro'] . "'>(-)</a></center></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
</div>
</body>
</html>