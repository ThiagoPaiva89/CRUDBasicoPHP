<?php 

require_once "inc/config.inc.php";


//Pega os valores digitados no formulário form_inserir e armazena nas variáveis
$nome      = filter_input(INPUT_POST, "nome");
$sobrenome = filter_input(INPUT_POST, "sobrenome");
$cat      = filter_input(INPUT_POST, "categoria");

//instancia objeto
$obj = new Famoso;

//atribui os valores às propriedades
$obj->setNome($nome);
$obj->setSobrenome($sobrenome);
$obj->setCategoria($cat);

//verifica se o método inserir() retorna TRUE
if($obj->inserir()){
	echo "<script>alert('Registro Inserido com Sucesso!!!');location='principal.php?link=1'</script>";
}else{
	echo "Erro ao inserir <hr>";
}