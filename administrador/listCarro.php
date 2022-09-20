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
        echo "<td>" . $value['categoria'] . "</td>";

         $imagem1 = $value['imagem1'];
        echo '<td><img style="width:80px;" src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem1) . '"></td>';

         $imagem2= $value['imagem2'];
        echo '<td><img style="width:80px;" src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem2) . '"></td>';

          $imagem3 = $value['imagem3'];
        echo '<td><img style="width:80px;" src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem3) . '"></td>';

         $imagem4 = $value['imagem4'];
        echo '<td><img style="width:80px;" src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem4) . '"></td>';

          $imagem5 = $value['imagem5'];
        echo '<td><img style="width:80px;" src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem5) . '"></td>';

    }
     
     
    echo "</table>";
}
