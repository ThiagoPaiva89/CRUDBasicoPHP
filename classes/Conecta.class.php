<?php 

/*Nunca instancia objetos*/
abstract class Conecta{

	/**@var PDO*/
	private static $Instancia = null;

	private static function pegarInstancia(){
		/*Verifica se instancia é nula*/
		if(is_null(self::$Instancia)){
			try{
				$dsn = "mysql:host=localhost;dbname=pdo_manha";
				self::$Instancia = new PDO($dsn, "root", "");
				self::$Instancia->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
				}catch(PDOException $e){
				echo "Erro: " .$e->getMessage();
			}
		}
		return self::$Instancia;
	}

	protected static function preparaSQL($sql){
		return self::pegarInstancia()->prepare($sql);
	}

}