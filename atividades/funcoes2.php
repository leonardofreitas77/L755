<?php
    require_once "funcoes.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];

    $media = calcularMedia($nota1, $nota2);

    $situacao = verificarStatus($media)
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções no front</title>
</head>
<body>
    <form method="POST">
   
<label>NOTA 1</label>
<input type="number" class="nota1" id="nota1" name="nota1">

           

<label>NOTA 2 </label>
<input type="number" class="nota2" id="nota2" name="nota2">


<button type="submit"> ENVIAR</button>

</form>
<h2><?= $situacao ?></h2>

</body>
</html>