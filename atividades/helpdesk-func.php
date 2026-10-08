<?php
{
    $arquivo = "chamados.json";

    $dados = file_get_contents($arquivo);

    $chamados = json_decode($dados, true);
}