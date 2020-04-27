<?php 

require_once("CRUD.class.php");

class Login extends CRUD{

	protected $Tabela = "login";

	private $NomeCompleto;
	private $Login;
	private $Senha;

	function setNomeCompeto($nome){
		$this->NomeCompleto = $nome;
	}

	function setLogin($login){
		$this->Login = $login;
	}

	function setSenha($senha){
		$this->Senha = $senha;
	}

	function getNomeCompleto(){
		return $this->NomeCompleto;
	}

	function getLogin(){
		return $this->Login;
	}

	function getSenha(){
		return $this->Senha;
	}

	function inserir(){}
	function atualizar($id){}

	function logar(){
		$sql = "SELECT * FROM {$this->Tabela} WHERE login = ? AND senha = ?";
		$stmt = Conecta::preparaSQL($sql);
		$stmt->bindValue(1, $this->getLogin());
		$stmt->bindValue(2, $this->getSenha());
		$stmt->execute();
		if($stmt->rowCount()){
			$_SESSION["logado"] = true;
			return true;
		}else{
			return false;
		}
	}

	static function deslogar(){
		if($_SESSION["logado"]){
			session_unset();
			session_destroy();
			header("location:index.php");
		}
	}

}