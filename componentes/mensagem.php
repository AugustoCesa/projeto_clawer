<?php

if (isset($_POST ['email']) && !empty($_POST['email'])){

$nome = addslashes($_POST['nome']);
$email = addslashes($_POST['email']);
$mensagem = addslashes($_POST['mensagem']);


$para = "autoclawer@gmail.com";
$assunto= "Contato - Clawer";

$body= "Nome: ".$nome. "/r/n";
       "E-mail: ".$email."/r/n";
       "Mensagem: ".$mensagem;

$header = "From: autoclawer@gmail.com"."/r/n".
"Reply-To".$email . "/r/n"
."X=Mailer: PHP/". phpversion();

if (mail($para,$assunto,$body,$header)){
echo("E-mail enviado com sucesso");

}else("O email não foi enviado");




}
?>