<?php

// Verifica se existe os dados da sessão de login
if(empty($_SESSION["nome"]))
{
// Usuário não logado! Redireciona para a página de login
header("Location: componentes/login.php");
exit;
}
?>