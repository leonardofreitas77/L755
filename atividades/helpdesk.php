<?php 

require_once "help-func.php";

$relatorio = gerarRelatorio();

echo "Total de chamados: " . $relatorio["total"];
echo "<br>";

echo "Chamados abertos " . $relatorio["abertos"];
echo "<br>";

echo "Chamados em adamento" . $relatorio["andamento"];
echo "<br>";
