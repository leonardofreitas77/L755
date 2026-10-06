<?php

$arquivo = "dados/produtos.json";

// Verifica se o formulario foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Receber  os dados do formulario 
    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $marca = $_POST["marca"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];
    $fabricanteNome = $_POST["fabricante_nome"];
    $fabricantePais = $_POST["fabricante_pais"];

    // 2. Ler o arquivo JSON 
    $conteudo = file_get_contents($arquivo);

    // 3. Converter o JSON para array PHP
    $produtos = json_decode($conteudo, true);

    // caso o arquivo esteja vazio ou inválido
    if (!is_array($produtos)) {
        $produtos = [];
    }

    // 4. Criar o array associativo do novo produto 
    $novoProduto = [
        "nome" => $nome,
        "categoria" => $categoria,
        "marca" => $marca,
        "preco" => $preco,
        "quantidade" => $quantidade,
        "fabricante" => [
            "nome" => $fabricanteNome,
            "pais" => $fabricantePais
        ]
     ];

     // 5. Adicionar o produto ao array 
     $produtos[] = $novoProduto;

     // 6. converter o array novamente para JSON
     $json = json_encode(
        $produtos,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
     );
 
     // 7. Salvar no arquivo JSON 
     file_put_contents($arquivo, $json);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>

    <link rel="stylesheet" href="cadastro-de-produtos.css">

</head>

<body>
    
    <h1>Cadastro de Produtos</h1>

    <form method="POST">

    <label>Nome do produto:</label>
    <input type="text" name="nome" required>
    <br><br>

    <label>Marca:</label>
    <input type="text" name="marca" required>
    <br><br>

    <label>Preço:</label>
    <input type="number" name="preco" step="0.01" min="0" required>
    <br><br>

    <label>Quantidade em estoque:</label>
    <input type="number" name="quantidade" min="0" required>
    <br><br>

    <h2>Fabricante:</h2>

    <label>Nome do fabricante:</label>
    <input type="text" name="fabricante_nome" required>
    <br><br>

    <label>País de origem:</label>
    <input type="text" name="fabricante_pais" required>
    <br><br>

    <button type="submit">Cadastrar produto</button>

    </form>

    <hr>

    <h2>PRODUTOS CADASTRADOS</h2>

    <?php

    // Ler novamente os produtos armazenados 
    $conteudo = file_get_contents($arquivo);

    // Converter JSON para array PHP
    $produtos = json_decode($conteudo, true);

    if (!empty($produtos)) {

        $valorTotal = 0;
        
        foreach ($produtos as $produto) {
            echo "<div>";

            echo "<p><strong>Nome:</strong> " . htmlspecialchars($produto["nome"]) . "</p>";

            echo "<p><strong>Categoria:</strong> " . htmlspecialchars($produto["categoria"]) . "</p>";

            echo "<p><strong>Marca:</strong> " . htmlspecialchars($produto["marca"]) . "</p>";

            echo "<p><strong>Preço:</strong> R$ " . number_format($produto["preco"], 2, ",",".") . "</p>";

            echo "<p><strong>Quantidade:</strong> " . $produto["quantidade"] . "</p>";

            echo "<p><strong>Fabricante:</strong> "
            . htmlspecialchars($produto["fabricante"]["nome"])
            . "</p>";

            // Desafio extra 
            $valorTotal += $produto["preco"] * $produto["quantidade"];

            echo "<p><strong>Valor total em estoque:</strong> R$"
            . number_format($valorTotal, 2, ",", ".")
            . "</p>";

            echo "<hr>";

            echo "</div>";

        }

         // Mostra o total apenas uma vez
        echo "<h3><strong>Valor total em estoque:</strong> R$ "
        . number_format($valorTotal, 2, ",", ".")
        . "</h3>";


    } else {
        echo "<p>Nenhum produto cadastrado.</p>";

    }
    ?>

</body>
</html>