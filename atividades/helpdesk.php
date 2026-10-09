<?php 

require_once "help-func.php";

$relatorio = gerarRelatorio();

echo "Total de chamados: " . $relatorio["total"];
echo "<br>";

echo "Chamados abertos " . $relatorio["abertos"];
echo "<br>";

echo "Chamados em adamentos" . $relatorio["andamentos"];
echo "<br>";

echo "chamados resolvidos" . $relatorio["resolvidos"];
echo "<br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help desk</title>
</head>
<body>
    
    <h1>Sistema de Chamados</h1>

    <h2>Cadastrar chamados</h2>

    <form method="POST">

    nome:
    <input type="text", name="nome">
    <br><br>

    setor:
    <select name="setor">
        <option>Produção</option>
        <option>Administrativo</option>
        <option>Logistica</option>
        <option>Financeiro</option>
        <option>TI</option>
    </select>
    <br><br>

    equipamento: 
    <select name="Equipamento">
        <option>Computador</option>
        <option>Impressora</option>
        <option>Rede</option>
        <option>Sistema</option>
        <option>Outro</option>
    </select>
    <br><br>

    descrição: 
    <select name="prioridade">
        <option>Baixa</option>
        <option>Média</option>
        <option>Alta</option>
    </select>
    <br><br>

    <button type="submit" name="cadastrar">
        Cadastrar
    </button>

    </form>
    
</body>
</html>