<?php


// PHP: linguagem que executa as regras do sistema
//MySql: SGB


// host = 'local host'
$host = 'localhost';
$db = 'joaoa755_db1';
$user = 'joaoa755';
$pass = '755!@#';
$charset = 'utf8mb4';

try {

    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset",

    $user,
    $pass

);


$pdo->setAttribute(
      PDO::ATTR_ERRMODE,
      PDO::ERRMODE_EXCEPTION
);

echo "CONECTADO COM SUCESSO";


} catch (PDOException $e) {

     echo "ERRO AO CONECTAR AO BANCO DE DADOS:\n";
     echo $e->getMessage();
}

?>