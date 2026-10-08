<?php
{
    $arquivo = "chamados.json";

    $dados = file_get_contents($arquivo);

    $chamados = json_decode($dados, true);
}

function salvarChamados($chamados) {
    $dados json_encode($chamados, JSON_PRETTY_PRINT);

    file_put_contents("chamados.json", $dados);


}