<?php

$nome = $_GET["nome"] ?? "";
$idade = $_GET["idade"] ?? "";

$resultado = "";

if ($idade !== "") {
    if ($idade >= 18) {
        $resultado = "$nome é maior de idade";
    } else {
        $resultado = "$nome é menor de idade";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de idade</title>
    <link rel="stylesheet" href="idade.css">
</head>

<body>

    <h1>Cadastro</h1>

    <form method="GET">

        <label for="nome">Nome:</label>
        <input type="text" class="nome" id="nome" name="nome">

        <label for="idade">Idade:</label>
        <input type="number" class="idade" id="idade" name="idade">

        <button type="submit">Cadastrar</button>

    </form>

    <p><?= $resultado ?></p>

</body>
</html>
