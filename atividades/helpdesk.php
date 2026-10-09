<?php 

require_once "help-func.php";

if ($_POST["cadastrar"] == "cadastrar") {

$nome = $_POST["nome"];
$setor = $_POST["setor"];
$equipamento = $_POST["equipamento"];
$descricao = $_POST["descricao"];
$prioridade = $_POST["prioridade"];

if ($nome != "") {
    if ($descricao != "") {

        cadastrarChamado(
            $nome,
            $setor,
            $equipamento,
            $descricao,
            $prioridade
        );

        echo "Chamado cadastrado com sucesso!";

    }
    else {
        echo "Preencha o nome!";
    }
}
   
}

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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help desk</title>
    <link rel="stylesheet" href="css/helpdesk.css">
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
    <select name="equipamento">
        <option>Computador</option>
        <option>Impressora</option>
        <option>Rede</option>
        <option>Sistema</option>
        <option>Outro</option>
    </select>
    <br><br>

    descrição: 
    <select name="decricao">
        <option>Baixa</option>
        <option>Média</option>
        <option>Alta</option>
    </select>
    <br><br>

    Prioridade:
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