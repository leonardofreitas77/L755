<?php
    require_once "conexao.php";

    // 1. CRIAR TABELA
    $sql = "CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL)";

    $pdo->exec($sql);

    // 2. CADASTRAR PRODUTO 
    if (isset($_POST["cadastrar"])) {
        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $quantidade =$_POST["quantidade"];

        $sql - "INSERT INTO produtos (nome. preco, quantidade) VALUES ($nome, $preco, $quantidade)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([

        "nome" => $nome,
        "preco" => $preco,
        "quantidade" => $quantidade
        ]);
    }

    // 3. ATUALIZAR PRODUTO
    if (isset($_POST["atualizar"])) {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $quantidade = $_POST["quantidade"];

        $sql = "UPDATE produtos SET nome = '$nome', preco = $preco, quantidade = $quantidade WHERE id = $id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            "nome" => $nome,
            "preco" => $preco,
            "quantidade" => $quantidade,
            "id" => $id
        ]);
    }

    // 4. EXCLUIR PRODUTO 

    if(isset($_POST["excluir"])) {
        $id = $_POST["id"];
        $sql = "DELETE FROM produtos WHERE id = $id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "id" => $id
             ]);
    }

    // 5. BUSCAR PRODUTO PARA EDIÇÃO 
    $produtoEditar = null;

    if(isset($_GET["editar"])) {
        $id = $_GET["editar"];
        $sql = "SELECT * FROM produtos WHERE id = $id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["id" => $id]);
        $produtoEditar = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 6. LISTAR TODOS OS PRODUTOS 
    $sql = "SELECT * FROM produtos ORDER BY id ASC";
    $stmt = $pdo->query($sql);
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sistema de cadastro de produtos </h1>
<h2>
<?php

if ($produtoEditar){

echo "editar produto";



}else{
    echo "Cadastrar Produto";
}

?>
</h2>
<form method="POST">
<?php if ($produtoEditar) {?>
    <input type="hidden" name="id" value="<?=  $produtoEditar['id'] ?>">
    <?php }?>
    <label>Nome do Produto:</label> 
<input type="text"name="nome" value="<?= $produtoEditar ['nome']?? '' ?>">
<br><br>
<label>Preço:</label>
<input type="number" name="preco" step="0.01" min="0" required value="<?=$produtoEditar['preco']?? '' ?>">
<br><br>
<label>Quantidade:</label>
<input type="number" name="quantidade" min="0" required value="<?=$produtoEditar['quantidade']?? '' ?>">
<br><br>
<?php if($produtoEditar){?>
<button type="submit" name="atualizar">Atualizar Produto</button>
<?php } else{?>
<button type="submit" name="cadastrar">cadastrar Produto</button>
<?php } ?>
</form>
<hr>
<h2>Produtos Cadastrados</h2>
<table>
<tr>
<th>ID</th>
<th>Nome</th>
<th>Preço</th>
<th>Quantidade</th>
<th>Ações</th>

<?php foreach ($produtos as $produto) { ?>

<td><?=  $produto['id'] ?></td>
<td><?= htmlspecialchars($produto['id']) ?> </td>
<td>R$<?= number_format($produto['preco'],2,",",".") ?> </td>
<td><?= $produto["quantidade"] ?>
</td>

<a href="index.php?editar=<? $produto['id'] ?>">Editar</a>

<form action="index.php" method="post" style="display:inline;">
<input type="hidden" name="id" value="<?= $produto['id'] ?>">
<button type="submit" name="excluir" onclick="return confirm
('Deseja excluir este produto?')">Excluir</button>
</form>
</<td>
</tr>
<?php } ?>





</table>





</body>
</html>