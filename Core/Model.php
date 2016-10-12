<?php
namespace Core;
use PDO;

abstract class Model{
	protected $dbh;
	protected $stmt;

	public function __construct(){
		$this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
	}


/*====================================================
	QUERY
====================================================*/
	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

/*====================================================
	BIND ( prevents SQL injection)
====================================================*/
	public function bind($param, $value, $type = null){
 		if (is_null($type)) {
  			switch (true) {
    			case is_int($value):
      				$type = PDO::PARAM_INT;
      				break;
    			case is_bool($value):
      				$type = PDO::PARAM_BOOL;
      				break;
    			case is_null($value):
      				$type = PDO::PARAM_NULL;
      				break;
    				default:
      				$type = PDO::PARAM_STR;
  			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}


/*====================================================
	EXECUTE
====================================================*/
	public function execute(){
		$this->stmt->execute();
	}


/*====================================================
	QUERY SINGLE ROW
====================================================*/
	public function single(){
		$this->execute();
		// FETCH_ASSOC = associative array
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

/*====================================================
	QUERY RESULT SET
====================================================*/
	public function resultSet(){
		$this->execute();
		// FETCH_ASSOC = associative array
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}


/*====================================================
	LAST INSERT ID (last insert was successful)
====================================================*/
	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}



}