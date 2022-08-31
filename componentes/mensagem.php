<?php include "../include/MySql.php" ?>

<?php

$nome ="";
$nomeErro="";

$email="";
$emailErro="";

$mensagem="";
$mensagemErro="";



if (empty($_POST['nome']))
       $marcaErro = "Nome é obrigatório!";
else
       $marca = $_POST['nome'];

if (empty($_POST['email']))
       $nomeErro = "E-mail é obrigatório!";
else
       $nome = $_POST['email'];

if (empty($_POST['mensagem']))
       $modeloErro = "Mensagem é obrigatório!";
else
       $modelo = $_POST['mensagem'];


        
       if ($nome && $email && $mensagem) {
              
              $sql = $pdo->prepare("SELECT * FROM mensagem WHERE mensagem = ?");
              if ($sql->execute(array($modelo))) {
                  if ($sql->rowCount() <= 0) {
                      $sql = $pdo->prepare("INSERT INTO mensagem (nome, email, mensagem)
                                              VALUES (?, ?, ?)");
                      if ($sql->execute(array($nome,$email,$mensagem))) {
                          $msgErro = "Dados cadastrados com sucesso!";
                          $nome = "";
                          $email="";
                          $mensagem="";

                          header('location:index.php');
                      } else {
                          $msgErro = "Dados não cadastrados!";
                      }
                  } else {
                      $msgErro = "mensagem de usuário já cadastrado!!";
                  }
              } else {
                  $msgErro = "Erro no comando SELECT!";
              }
          } else {
              $msgErro = "Dados não cadastrados!";
          }



?>