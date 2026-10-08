<?php
{
    $arquivo = "chamados.json";

    $dados = file_get_contents($arquivo);

    $chamados = json_decode($dados, true);

    return $chamados;
}

function salvarChamados($chamados) {
    $dados = json_encode($chamados, JSON_PRETTY_PRINT);

    file_put_contents("chamados.json", $dados);

   
}

function cadastrarChamado($nome, $setor, $equipamento, $descricao, $prioridade) {

$novochamado = [
    "nome" => $nome,
    "setor" = $setor,
    "equipamento" => $equipamento,
    "descrição" => $descrição,
    "prioridade" => $prioridade  ,
]
}
