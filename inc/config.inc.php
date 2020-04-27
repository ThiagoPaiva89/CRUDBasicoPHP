<?php 

function __autoload($classe){
	$dir = "classes";
	if(file_exists("$dir/$classe.class.php")){
		require_once"$dir/$classe.class.php";
	}else{
		echo "Não foi possível carregar a classe {$classe} <hr>";
	}
}