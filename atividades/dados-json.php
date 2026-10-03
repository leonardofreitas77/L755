<?php

// Verifica se o formulario foi enviado usando o método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $idade = $POST["idade"];

    // recebe as notas de Português
    $portugues_prova1 = $_POST["portugues_prova1"];
    $portugues_prova2 = $POST["portugues_prova2"];
    $portugues_prova3 = $POST["portugues_prova3"];

    //recebe as notas de matematica
    $matematica_prova1 = $POST["matematica_prova1"];
    $matematica_prova2 = $POST["matematica_prova2"];
    $matematica_prova1 = $POST["matematica_prova3"];

    //recebe as notas de historia
    $historia_prova1 = $POST["historia_prova1"];
    $historia_prova2 = $POST["historia_prova2"];
    $historia_prova3 = $POST["historia_prova3"];

    //==================================
    //
    $novoAluno = [
        "nome" => $nome,
        "idade"=> $idade,

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

    $conteudoJson = file_get_contents(__DIR__ . "/dados/intro.json");

    // SERVE PARA CONVERTER JSON PARA ARRAY
    // O TRUE SERVE PARA CONVERTER O JSON EM ARRAY ASSOCIATIVO PARA PHP LER 

    $alunos = json_decode($conteudoJson, true);

    // ADICIONAR O NOVO ALUNO AO ARMAZENAMENTO

    $alunos[] = $novoAluno;

    // CONVERTER O ARRAY PHP PARA JSON

    $jsonAtuslizado = json_encode(
        $alunos,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    // SALVAR NO ARQUIVO

    file_put_contents(__DIR__ . "/dados/intro.json",$jsonAtuslizado);
}

    // LEITURA DOS DADOS PARA EXIBIÇÃO

    // LÊ O ARQUIVO JSON

$conteudoJson = file_get_contents(__DIR__ . "/dados/intro.json");

    // CONVERTE O JSON PARA ARRAY PHP

    $alunos = json_decode($conteudoJson, true);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CADASTRO DE NOTAS</h1>
    <form method="POST"><label>Nome</label>
        <input type="text" name="nome" required>
        <br><br>
        <label>Idade</label>
        <input type="number" name="idade" required>
        <h2>Português</h2>
        <label>Prova 1:</label>
        <input type="number" name=portugues_prova1 min="0" max="10" step="0.1" required>
        <br><br>
        <label>Prova 2:</label>
        <input type="number" name=portugues_prova2 min="0" max="10" step="0.1" required>
        <br><br>
        <label>Prova 3:</label>
        <input type="number" name=portugues_prova3 min="0" max="10" step="0.1" required>

        <h2>matemática</h2>
        <label>Prova 1:</label>
        <input type="number" name=matematica_prova1 min="0" max="10" step="0.1" required>
        <br><br>
        <label>prova 2:</label>
        <input type="number" name=matematica_prova2 min="0" max="10" step="0.1" required>
        <br><br>
        label>prova 3:</label>
        <input type="number" name=matematica_prova3 min="0" max="10" step="0.1" required>

        <br><br>
        label>prova 1:</label>
        <input type="number" name=historia_prova1 min="0" max="10" step="0.1" required>
        <br><br>
        label>prova 2:</label>
        <input type="number" name=historia_prova2 min="0" max="10" step="0.1" required>
        <br><br>
        label>prova 3:</label>
        <input type="number" name=historia_prova3 min="0" max="10" step="0.1" required>
        <br><br>
        <button type="submit">Enviar</button>
    </form>

    <h1>ALUNOS CADASTRADOS</h1>

    <?php foreach ($alunos as $aluno) { ?>

        <h2> <?= $aluno["nome"] ?></h2>
        <p>  Idade: <?= $aluno["idade"] ?> </p>

        <!-- PORTUGUES --->

        <h2>PORTUGUÊS</H2>
        <P>Prova 1: <?= $aluno ["notas"]["português"]["prova1"] ?> </P>
        <P>Prova 2: <?= $aluno ["notas"]["português"]["prova2"] ?> </P>
        <P>Prova 3: <?= $aluno ["notas"]["português"]["prova3"] ?> </P>

        <!-- MATEMÁTICA -->

        <P>Prova 1: <?= $aluno ["notas"]["matematica"]["prova1"] ?> </P>
        <P>Prova 2: <?= $aluno ["notas"]["matematica"]["prova2"] ?> </P>
        <P>Prova 3: <?= $aluno ["notas"]["matematica"]["prova3"] ?> </P>

        <!-- HISTÓRIA -->

        <P>Prova 1: <?= $aluno ["notas"]["historia"]["prova1"] ?> </P>
        <P>Prova 2: <?= $aluno ["notas"]["historia"]["prova2"] ?> </P>
        <P>Prova 3: <?= $aluno ["notas"]["historia"]["prova3"] ?> </P>
      <?php  } ?>
</body>
</html>