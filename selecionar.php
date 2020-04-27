<h2 style="text-align: center">Lista de Famosos</h2>
<table style="width:70%; text-align: center; margin:10px auto">
	<tr style="background-color:#333;color:#FFF; ">
		<td>Nome</td>
		<td>Sobrenome</td>
		<td>Categoria</td>
		<td>#</td>
	</tr>

<?php 
	//inclui o arquivo
	require_once "inc/config.inc.php";
	//instancia objeto
	$obj = new Famoso;
	//percorre todos os objetos dinâmicos
	foreach ($obj->selecionarTudo() as $linha) {		
?>	

	<tr>
		<td><?=$linha->nome?></td>
		<td><?=$linha->sobrenome?></td>
		<td><?=$linha->categoria?></td>
		<td>
			<a href="?link=3&id=<?=$linha->id?>">Editar</a>&nbsp;&nbsp;
			<a href="?link=4&id=<?=$linha->id?>">Excluir</a>
		</td>
	</tr>
	
<?php } ?>
</table>