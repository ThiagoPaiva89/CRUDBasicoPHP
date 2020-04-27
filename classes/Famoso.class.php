<?php 

require_once("CRUD.class.php");

class Famoso extends CRUD{

	protected $Tabela = "famosos";
	private $Nome;
	private $Sobrenome;
	private $Categoria;

	function setNome($nome){
		$this->Nome = $nome;
	}

	function setSobrenome($sobrenome){
		$this->Sobrenome = $sobrenome;
	}

	function setCategoria($categoria){
		$this->Categoria = $categoria;
	}

	function getNome(){
		return $this->Nome;
	}

	function getSobrenome(){
		return $this->Sobrenome;
	}

	function getCategoria(){
		return $this->Categoria;
	}


	/*Insere registro na tabela*/
	function inserir(){
		$sql = "INSERT INTO {$this->Tabela}(nome,sobrenome,categoria) VALUES (?,?,?)";
		$stmt = Conecta::preparaSQL($sql);
		$stmt->bindValue(1, $this->getNome());
		$stmt->bindValue(2, $this->getSobrenome());
		$stmt->bindValue(3, $this->getCategoria());
		return $stmt->execute();
	}

	/*atualiza o registro na tabela utilizando a chave primária*/
	function atualizar($id){
		$sql  = "UPDATE {$this->Tabela} SET nome = ?, sobrenome = ?, categoria = ? WHERE id = ?";
		$stmt = Conecta::preparaSQL($sql);
		$stmt->bindValue(1, $this->getNome());
		$stmt->bindValue(2, $this->getSobrenome());
		$stmt->bindValue(3, $this->getCategoria());
		$stmt->bindValue(4, $id);
		return $stmt->execute();
	}


	//busca registros pelo nome, sobrenome ou categoria
		function pesquisar($valor){
		$sql = "SELECT * FROM {$this->Tabela} WHERE nome LIKE ? OR sobrenome LIKE ? OR categoria LIKE ?";
		$stmt = Conecta::preparaSQL($sql);
		$stmt->bindValue(1, $valor);
		$stmt->bindValue(2, $valor);
		$stmt->bindValue(3, $valor);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}