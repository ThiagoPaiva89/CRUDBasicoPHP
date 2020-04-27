<?php 

require_once("Conecta.class.php");

abstract class CRUD extends Conecta{

	protected $Tabela;

	protected abstract function inserir();
	protected abstract function atualizar($id);

	/*Lista todos os registros da tabela*/

	public function selecionarTudo(){
		$sql  = "SELECT * FROM {$this->Tabela}";
		$stmt = Conecta::preparaSQL($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	/*lista o registro utilizando chave primária*/
	public function selecionar($id){
		$sql  = "SELECT * FROM {$this->Tabela} WHERE id = ?";
		$stmt = Conecta::preparaSQL($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		return $stmt->fetch();
	}

	/*exclui o registro utilizando a chave primária*/
	public function deletar($id){
		$sql  = "DELETE FROM {$this->Tabela} WHERE id = ?";
		$stmt = Conecta::preparaSQL($sql);
		$stmt->bindValue(1, $id);
		return $stmt->execute();
	}
}