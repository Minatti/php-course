<?php  
class Sql extends PDO {

	private $conexao;

	public function __construct(){

		$this->conexao = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");

	}

	private function setParams($statement, $parameters = array()){

		foreach ($parameters as $key => $value) 

	{
			
		$this->setParam($statment, $key, $value);
	}

	}
	
	private function setParam($statement, $key, $value)

	{

		$statment->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array())

	{

		$stmt = $this->conexao->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;

	}
	

	public function select($rawQuery, $params = array()):array{

		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchALL(PDO::FETCH_ASSOC);
	}

}
?>
