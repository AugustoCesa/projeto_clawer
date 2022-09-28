<?php
include "componentes/nav.php";
include "include/verifica.php";
$idCarro = 0;
$idPessoa = 0;
$where = "";
$whereP = "";


if (isset($_SESSION['nome'])) {
    if (isset($_SESSION['nome'])) {

    ///////////// Puxando o Carro

    if (isset($_GET['id'])) {
        $idCarro = $_GET['id'];

        $where = "WHERE  CodCarro = $idCarro";
    }


    $sql = $pdo->prepare('SELECT nome FROM carros ' . $where);
    if ($sql->execute()) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $key => $valueCarro) {

            //////////////// Puxando o Usuário

            if (isset($_SESSION['codigo'])) {
                $idPessoa = $_SESSION['codigo'];

                $whereP = "WHERE  codigo = $idPessoa";
            }

            $sql = $pdo->prepare('SELECT * FROM usuario ' . $whereP);
            if ($sql->execute()) {
                $info = $sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($info as $key => $valuePessoa) {
                    
?>
                    <br>
                    <div class="container" style="color: white;">
                        <h1 class="words">Veiculo selecionado</label></h1>

                        <input type="text" value="<?php echo $valueCarro['nome'] ?>" disabled>
                        <br>

                        <h2 class="words">Seu Nome Completo</h2>
                        <input type="text" id="textfield_a1ad" value="<?php echo $valuePessoa['nome'] ?>" disabled>
                        <br>
                        <h2 class="words">Telefone</h2>
                        <input type="tel" id="textfield_a1ad"  value="<?php echo $valuePessoa['telefone'] ?>" disabled>
                        <br>
                        <h2 class="words">Email</h2>
                        <input type="email" id="textfield_a1ad"  value="<?php echo $valuePessoa['email'] ?>" disabled>
                        <br>
                        <br>
                        <h2>Ecolha o local!</h2>
                       <select name="" id="">
                        <option>Joinville</option>
                        <option value="">Balneário Camboriu</option>
                        <option value="">Blumenau</option>

                       </select>
                        <br>
                        <div style="display: flex; flex-direction:row">
                        <input type="checkbox" style="width:20px"> <p style="margin-top: 14px; margin-left:5px">estou ciente que serei avisado sobre a minha solicitação! Por email.</p>
                        </div>
                        <br>
                       <a href="solicitacao.php"><input type="submit" name="enviar" href="solicitacao.php"></a>

                        <br>

                    </div>
                    <br>
        <?php
                }
            }
        }
    } else {
        ?>
        <br><br>
        <h1>deu erro</h1>
<?php
    }
}
}
include "componentes/footer.php"
?>