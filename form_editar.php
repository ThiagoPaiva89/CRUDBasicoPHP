<?php 

//iunclui o arquivo
require_once "inc/config.inc.php";

//instancia objeto
$obj = new Famoso;

//pega o valor do parâmetro 'id'
$id = filter_input(INPUT_GET, "id");

//executa o método selecionar($id)
$linha = $obj->selecionar($id);

?>

<h2 style="text-align: center">Editar Famoso</h2>
<form method="post" action="editar.php">
	Nome: &nbsp;&nbsp;
	<input type="text" name="nome" required value="<?=$linha->nome?>"><br><br>
	Sobrenome: &nbsp;&nbsp;
	<input type="text" name="sobrenome" required value="<?=$linha->sobrenome?>"><br><br>
	Categoria: &nbsp;&nbsp;
	<input type="text" name="categoria" required value="<?=$linha->categoria?>"><br><br>
	<input type="hidden" name="id" value="<?=$linha->id?>">
	<input type="submit" value="Alterar">
</form>