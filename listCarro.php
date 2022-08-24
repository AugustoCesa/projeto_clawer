<?php
    include "include/MySql.php";

    $sql = $pdo->prepare('SELECT * FROM carros');
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr>";
        echo "  <th>CodCarro</th>";
        echo "  <th>marca</th>";
        echo "  <th>nome</th>";
        echo "  <th>preco</th>";
        echo "  <th>ano</th>";
        echo "  <th>cambio</th>";
        echo "  <th>portas</th>";
        echo "  <th>combustivel</th>";
        echo "  <th>kilometragem</th>";
        echo "  <th>placa</th>";
        echo "  <th>cor</th>";
        echo "  <th>modelo</th>";
        echo "  <th>Imagem</th>";
        echo "  <th>Alterar</th>";
        echo "  <th>Excluir </th>";
        echo "</tr>";

        foreach($info as $key => $value){
            echo "<tr>";
            echo "<td>".$value['codigo']."</td>";
            echo "<td>".$value['marca']."</td>";
            echo "<td>".$value['nome']."</td>";
            echo "<td>".$value['preco']."</td>";
            echo "<td>".$value['ano']."</td>";
            echo "<td>".$value['cambio']."</td>";
            echo "<td>".$value['portas']."</td>";
            echo "<td>".$value['combustivel']."</td>";
            echo "<td>".$value['kilometragem']."</td>";
            echo "<td>".$value['placa']."</td>";
            echo "<td>".$value['cor']."</td>";
            echo "<td>".$value['modelo']."</td>";
            $imagem = $value['imagem'];

            echo '<td><img style="width:80px;" src="data:image/jpg;charset=utf8;base64,'.base64_encode($imagem).'"></td>';

            echo "<td><center><a href='Altcarro.php?id=".$value['codigo']."'>(+)</a></center></td>";
            echo "<td><center><a href='delUsuario.php?id=".$value['codigo']."'>(-)</a></center></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>
<input type="button" value="Cadastrar" onclick="parent.location='CadCarro.php'">
<h3><a href="intAdm.php">Principal</a></h3>