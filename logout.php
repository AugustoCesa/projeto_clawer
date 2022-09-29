<?php
   session_start();
   session_destroy();
   header('location:index.php');
   //encerra a sessão
?>