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
<body>


        <h1>cadastro</h1>
        <form method="POST"> 
<label>Nome:</label>
<input type="text" class="nome" id="nome" name="nome">

<label>IDADE:</label>
<input type="number" class="idade" id="idade" name="idade">

<button type="submit"> Cadastrar</button>

     </form>
     <p> <?= $resultado?> </p>
   
</body>