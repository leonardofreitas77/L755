<?php

echo "DEBUG 1";
//Verifica se o formulario foi enviado usando o método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "DEBUG 2";
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];

    //recebe as notas de português

    $portugues_prova1 = $_POST["portugues_prova1"];
    $portugues_prova2 = $_POST["portugues_prova2"];
    $portugues_prova3 = $_POST["portugues_prova3"];

    //recebe as notas de matematica

    $matematica_prova1 = $_POST["matematica_prova1"];
    $matematica_prova2 = $_POST["matematica_prova2"];
    $matematica_prova3 = $_POST["matematica_prova3"];


    //recebe as notas de historia

    $historia_prova1 = $_POST["historia_prova1"];
    $historia_prova2 = $_POST["historia_prova2"];
    $historia_prova3 = $_POST["historia_prova3"];

    echo "DEBUG 2";
    //organiza os dados em um array
    $novoaluno = [

        "nome" => $nome,
        "idade" => $idade,
        "notas" => [
            "portugues" => [
                "prova1" => $portugues_prova1,
                "prova2" => $portugues_prova2,
                "prova3" => $portugues_prova3,
            ],
            "matematica" => [
                "prova1" => $matematica_prova1,
                "prova2" => $matematica_prova2,
                "prova3" => $matematica_prova3,


            ],
            "historia" => [
                "prova1" => $historia_prova1,
                "prova2" => $historia_prova2,
                "prova3" => $historia_prova3,


            ]
        ]
    ];

    //SERVE PARA LER/ABRIR ARQUIVO JSON

    echo "DEBUG 3";
    $conteudoJson = file_get_contents(__DIR__ . "/dados/intro.json");

    //SERVE PARA CONVERTAR JSONS PARA ARRAY PHP
    //o true ser para converter o json em array associativo para php ler
    $alunos = json_decode($conteudoJson, true);

    //adicionar o novo aluno 

    $alunos[] = $novoaluno;

    echo "DEBUG 4";
    //CONVERTER O ARRAY PHP PARA JSON

    $jsonatualizado = json_encode(
        $alunos,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    //SALVAR NO ARQUIVO JSON

    file_put_contents(__DIR__ . "/dados/intro.json", $jsonatualizado);
}


echo "DEBUG 5";
//lê o arquivo JSON

$conteudoJson = file_get_contents(__DIR__ . "/dados/intro.json");

//converte o JSON para ARRAY PHP

$alunos = json_decode($conteudoJson, true);

echo "DEBUG 6";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>CADASTRO DE NOTAS</h1>
    <form method="POST">
        <label>"Nome:</label>
        <input type="text" name="nome" required>
        <br><br>
        <label>idade:</label>
        <input type="number" name="idade" required>

        <h2>Português</h2>
        <label>Prova 1:</label>
        <input type="number" name="portugues_prova1" min="0" max="10" step="0.1" required>
        <br><br>
        <label>Prova 2:</label>
        <input type="number" name="portugues_prova2" min="0" max="10" step="0.1" required>
        <br><br>
        <label>Prova 3:</label>
        <input type="number" name="portugues_prova3" min="0" max="10" step="0.1" required>

        <h2>Matemática</h2>

        <input type="number" name="matematica_prova1" min="0" max="10" step="0.1" required>
        <br><br>
        <label>Prova 2:</label>
        <input type="number" name="matematica_prova2" min="0" max="10" step="0.1" required>
        <br><br>
        <label>Prova 3:</label>
        <input type="number" name="matematica_prova3" min="0" max="10" step="0.1" required>

        <h1>historia</h1>

        <input type="number" name="historia_prova1" min="0" max="10" step="0.1" required>
        <br><br>
        <label>Prova 2:</label>
        <input type="number" name="historia_prova2" min="0" max="10" step="0.1" required>
        <br><br>
        <label>Prova 3:</label>
        <input type="number" name="historia_prova3" min="0" max="10" step="0.1" required>
        <b></b>
        <button type="submit">Enviar</button>
    </form>

    <h1>ALUNOS CADASTRADOS</h1>

    <?php foreach ($alunos as $aluno) { ?>

        <h2> <?= $aluno["nome"]  ?> </h2>
        <p>idade:<?= $aluno["idade"] ?> </p>

        <!--PORTUGUS-->

        <h1>PORTUGUÊS</h1>
        <p>Prova 1: <?= $aluno["notas"]["portugues"]["prova1"] ?></p>
        <p>Prova 2: <?= $aluno["notas"]["portugues"]["prova2"] ?></p>
        <p>Prova 3: <?= $aluno["notas"]["portugues"]["prova3"] ?></p>

        <!--MATEMATICA-->

        <h1>MATEMATICA</h1>
        <p>Prova 1: <?= $aluno["notas"]["matematica"]["prova1"] ?></p>
        <p>Prova 2: <?= $aluno["notas"]["matematica"]["prova2"] ?></p>
        <p>Prova 3: <?= $aluno["notas"]["matematica"]["prova3"] ?></p>

        <!--história-->

        <h1>historia</h1>
        <p>Prova 1: <?= $aluno["notas"]["historia"]["prova1"] ?></p>
        <p>Prova 2: <?= $aluno["notas"]["historia"]["prova2"] ?></p>
        <p>Prova 3: <?= $aluno["notas"]["historia"]["prova3"] ?></p>


    <?php } ?>












</body>

</html>