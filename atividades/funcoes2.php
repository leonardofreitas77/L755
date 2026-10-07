<?php
    require_once "funcoes.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções no front</title>
</head>
<body>
    <h1><?=  $nomeEscola ?></h1>
    <h2><?= saudacao() ?></h2>
    <p><?= cumprimentar("Lucas") ?>
    </p>
    <p>
        Resultado da soma:
        <?= somar(10, 5) ?>
    </p>

</body>
</html>