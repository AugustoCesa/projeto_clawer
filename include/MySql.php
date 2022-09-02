<?php 
    define('HOST', 'localhost');
    define('DB', 'projeto');
    define('USER', 'root');
    define('PASS','');
    define('PORT', '3306');

    try{
        $pdo = new PDO('mysql:host='.HOST.';port='.PORT.';dbname='.DB, 
                       USER,
                       PASS,
                       array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(Exception $e){
        echo "Erro: $e";
    }

?>