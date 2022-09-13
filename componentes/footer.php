<?php

include "include/MySql.php";

$nome = "";
$email = "";
$mensageUser="";

$nomeErro = "";
$emailErro = "";
$mensageErro = "";

$codigo="";


if (empty($_POST['nome']))
    $nomeErro = "Nome é obrigatório!";
else
    $nome = $_POST['nome'];

if (empty($_POST['email']))
    $emailErro = "email é obrigatório!";
else
    $email = $_POST['email'];

if (empty($_POST['mensage']))
    $mensageErro = "Mensagem é obrigatório!";
else
    $mensageUser = $_POST['mensage'];


if ($nome && $mensageUser) {
    //Verificar se a mensagem já existe
    $sql = $pdo->prepare("SELECT * FROM MENSAGEM WHERE mensageUser = ?");
    if ($sql->execute(array($mensageUser))) {
        if ($sql->rowCount() <= 0) {
            $sql = $pdo->prepare(" INSERT INTO MENSAGEM(codigo, nome, email, mensageUser)
                                                VALUES (NULL, ?, ?, ?)");
            if ($sql->execute(array( $nome, $email, $mensageUser))) {
                $msgErro = "Dados cadastrados com sucesso!";
                $nome = "";
                $email = "";
                $mensageUser = "";

                header('location: ""');
            } else {
                $msgErro = "Dados não cadastrados!";
            }
        } else {
            $msgErro = "mensagem de usuário já enviada!";
        }
    } else {
        $msgErro = "Erro no comando SELECT!";
    }
} else {
    $msgErro = "Dados não enviados!";
}


?>

<footer>

    <div class="corfoot" style="color: white;
    background-image: linear-gradient(#0C2A43, black);">
        <div class="contact-area" style="text-align: center; color:white;">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="main-title">Entre em cotato conosco</h3>
                    </div>
                    <hr style="width: 130; height:3">
                    <div class="col-md-4 contact-box">
                        <i class="fas fa-phone"></i>
                        <p><span class="contact-title">Ligue para:</span>(47)9999-9999</p>
                        <p><span class="contact-title">Horário de funcionamento:</span> 8:00 - 19:00</p>
                    </div>

                    <div class="col-md-4 contact-box">
                        <i class="fas-fa-envelope"></i>
                        <p><span class="contact-title">Envie-nos um email</span> clawer_automoveis@gmail.com</p>
                    </div>

                    <div class="col-md-4 contact-box">
                        <p><span class="contact-title">Venha tomar um café:</span> Rua XXXX - 1340 </p>
                    </div>
                    <hr style="width:200; height:3">
                    <div class="col-md-6" id="msg-box">
                        <p>Ou nos deixe uma mensagem:</p>
                    </div>



                    <div class="col-md-6" id="contact-form">
                    <div style="display:flex; justify-content:center">
        <form method="POST" enctype="multipart/form-data">
            <fieldset style="display: flex; flex-direction: column; width:100%">
            
                nome: <input type="text" name="nome" style="width: 400px; width:100%; border-radius:15px" value="<?php echo $nome ?>">
                <span class="obrigatorio"style="font-size: x-small" >*<?php echo $nomeErro ?></span>
                
                email: <input type="email" style="border-radius:15px" name="email" value="<?php echo $email ?>">
                <span class="obrigatorio" style="font-size: x-small">*<?php echo $emailErro ?></span>
                
                Mensagem: <input type="text" style= "height:60px" name="mensage" value="<?php echo $mensageUser ?>">
                <span class="obrigatorio" style="font-size: x-small;">*<?php echo $mensageErro ?></span>
                

                
                <input type="submit" value="Salvar" name="submit">
            </fieldset>
        </form>
                    </div>
                </div>
            </div>






        </div>

        <div id="copy-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Desenvolvido por <a href="#">Clawer Automóveis</a>&copy; 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


</body>

</html>