<?php


include "../include/MySql.php";

$sql = $pdo->prepare('SELECT * FROM carros');
if ($sql->execute()) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
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
    echo " <th> categoria<th>";
    echo "  <th>imagem1</th>";
    echo "  <th>imagem2</th>";
    echo "  <th>imagem3</th>";
    echo "  <th>imagem4</th>";
    echo "  <th>imagem5</th>";


    echo "</tr>";
    foreach ($info as $key => $value) {
        echo "<tr>";
        echo "<td>" . $value['codCarro'] . "</td>";
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
        echo "<td>" . $value['categoria'] . "</td>";
        $imagem = $value['imagem1'];
        $imagem = $value['imagem2'];
        $imagem = $value['imagem3'];
        $imagem = $value['imagem4'];
        $imagem = $value['imagem5'];




        echo '<td><img style="width:80px;" src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem) . '"></td>';

    }
     
     
    echo "</table>";
}
?>
