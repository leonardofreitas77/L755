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
            if ($novoStatus == "resolvido") {
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

function excluirChamados($indice) {
    $chamados = lerChamados();

    $numero = 0;
    $encontrou = false; 

    foreach ($chamados as $chamado) {
        if ($numero == $indice) {
            $encontrou = true;
        }

        $numero = $numero + 1;
    }

    if ($encontrou == false) {
        return false;
    }

    unset($chamados[$indice]);

    $chamados = array_values($chamados); 

    salvarChamados($chamados);

    return true; 
}

function gerarRelatorio() {
    $chamados = lerChamados();

    $total = 0; 
    $abertos = 0;
    $andamentos = 0;
    $resolvidos = 0; 

    foreach ($chamados as $chamado) {
        $total = $total + 1;

        if ($chamado["status"] == "aberto") {
            $aberto = $aberto + 1; 
        }
        else {
            if ($chamado["status"] == "em andamento") {
                $andamento = $andamento + 1;
            }
            else {
                if ($chamado["status"] == "resolvido") {
                    $resolvido = $resolvido + 1; 
                }
            }
        }
    }
    $relatorio = [
        "total" => $total,
        "abertos" => $abertos,
        "andamento" => $andamento,
        "resolvido" => $resolvido
    ];
    return $relatorio;
}
    