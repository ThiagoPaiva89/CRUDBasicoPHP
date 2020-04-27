<?php 

//inclui o arquivo
require_once "inc/config.inc.php";

//pega o valor do parâmetro 'id'
$id = filter_input(INPUT_GET, "id");

//instancia objeto
$obj = new Famoso;

//verifica se o método deletar($id) retorna TRUE
if($obj->deletar($id)){
	echo "<script>alert('Registro Excuído com Sucesso');location='principal.php?link=2'</script>";
}