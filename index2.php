<?php



require_once 'conexao.php';

$sql = "CREATE TABLE IF NOT EXISTS usuarios(
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
email VARCHAR(50) NOT NULL UNIQUE,
telefone VARCHAR(13) NOT NULL UNIQUE,
ativo BOOLEAN DEFAULT 1,
data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP


)




";


$stmt = $pdo->prepare($sql);

$stmt->execute();

echo"TABELA CRIADA COM SUCESSO!";
?>