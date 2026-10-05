<?=

$nome = $_POST ["nome"];
$idade = $_POST["idade"];


$resultado = "";


if ($idade >= 18) 
    {
        $resultado = "é de maior";
    }
    else {
        $resultado = "é de menor";
    }



    

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verificador de idade</title>
    <link rel="stylesheet" href="idade.css">
</head>
<body>

        <h1>cadastro</h1>
        <form method="POST">
<div class="divNome">

    <label>Nome:</label>
    <input type="text" class="nome" id="nome" name="nome">

</div>             
<div class="divIdade">
    <label>idade:</label>
    <input type="number" class="idade" id="idade" name="idade">
</div>

<button type="submit"> Cadastrar</button>

     </form>
     <p> <?= $resultado?> </p>
   
</body>