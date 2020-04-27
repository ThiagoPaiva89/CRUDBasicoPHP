<?php 

	session_start();
	require_once "inc/config.inc.php";
	if($_SESSION["logado"] != true){
		echo "<script>alert('Sem Permissão de Acesso');location='index.php'</script>";
	}
	if(filter_input(INPUT_GET,"sair") == "sim"){
		Login::deslogar();
	}

?>


<h2 style="text-align:center">Menu Principal</h2>
<hr>
<div style="text-align:center">
<a href="?link=1">Cadastro</a> &nbsp;&nbsp;
<a href="?link=2">Listar</a> &nbsp;&nbsp;
<a href="?sair=sim" onclick="return confirm('Tem certeza que deseja sair?')">Sair</a>
</div>
<hr>
<?php 
	
	$link = filter_input(INPUT_GET, "link");
	$pag[1] = "form_inserir.php";
	$pag[2] = "selecionar.php";
	$pag[3] = "form_editar.php";
	$pag[4] = "deletar.php";

	if(file_exists($pag[$link])){
		require_once $pag[$link];
	}else{
		echo "Página não encontrada <hr>";
	}
?>