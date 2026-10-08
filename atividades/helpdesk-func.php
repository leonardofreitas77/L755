<?php
 function lerChamados() {
    $arquivo = "chamados.json";

    $dados = file_get_contents("../dados/chamados.json");
    $chamados = json_decode($dados, true);

    return $chamados;
}

function salvarChamados($chamados) {
    $dados = json_encode($chamados, JSON_PRETTY_PRINT);

    file_put_contents("../dados/chamados.json", $dados);

   
}

function cadastrarChamado($nome, $setor, $equipamento, $descricao, $prioridade) {

$novoChamado = [
    "nome" => $nome,
    "setor" => $setor,
    "equipamento" => $equipamento,
    "descricao" => $descricao,
    "prioridade" => $prioridade,

    "status" => "aberto"
];

 $chamados[] = $novoChamado;

 salvarChamados($chamados);

 return true;
}

function atualizarStatus ($indice, $novoStatus) {
   
    $chamados = lerChamados();

    if ($novoStatus == "aberto") {
        $chamados[$indice]["status"] = $novoStatus; 
    } 
    else {
        if ($novoStatus == "em andamento") {
            $chamados[$indice]["status"] = $novoStatus;
        }
        else {
            if ($novoStatus == "reslovido") {
                $chamados[$indice]["status"] = $novoStatus;
            }
            else {
                return false;
            }
        }
    }
    salvarChamados($chamados);

    return true;
}

