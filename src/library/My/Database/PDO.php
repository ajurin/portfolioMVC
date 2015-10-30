<?php

namespace My\Database;

class PDO extends \My\Database {

	protected $select;
	protected $from;

	protected $insert;
	protected $update;
	protected $delete;
	
	protected $where = null;
	protected $bindParams = null;
	protected $lock = null;

	protected static $dsn;
	protected static $username;
	protected static $password;
	protected $link;

	protected function __construct() {
		$this->link = new \PDO(self::$dsn, self::$username, self::$password);
	}
	
	public function select($why = '*'){
		if(!$this->lock) {
			$this->select = $why;
			$this->lock = 'select';
		}		
		return $this;
	}

	public function from($from){
		$this->from = $from;
		return $this;
	}

	public function where ($where, $value = null){
		if(!empty($this->select) || !empty($this->update) || !empty($this->delete)){
			if(is_string($where)){
				$where = array($where => $value);
			}
			if(is_array($where)){
				$wheres = null;
				$values = array();
				foreach($where as $key => $value){
					if($wheres == null){
						$wheres = " WHERE " . $key ;
					} else {
						$wheres .= " AND " . $key ;
					}
					$values[] = $value;
				}
				$this->where = $wheres;
				$this->bindParams = $values;
			}
		}
		return $this;
	}

	public function insert(array $data){
		if(!$this->lock) {
			$this->insert = $data;
			$this->lock = 'insert';
		}
		return $this;
	}

	public function update(array $data){
		if(!$this->lock) {
			$this->update = $data;
			$this->lock = 'update';
		}
		return $this;
	}

	public function delete(){
		if(!$lock) {
			$this->lock = 'delete';
		}
		return $this;
	}

	public function execute(){
		$res = array();
		if($this->lock != null){
			$method = 'exec' . ucfirst($this->lock);
			$res = $this->$method();
		}
		$this->lock = null;
		return $res;
	}

	protected function execSelect(){
		$sql = "SELECT " . $this->select
					.  " FROM `" . $this->from . "`"
					. $this->where
					. ";";
		

		$sth = $this->link->prepare($sql);
		$sth->setFetchMode(\PDO::FETCH_ASSOC);
		$sth->execute($this->bindParams);
		
		return $sth->fetchAll();
	}

	protected function execInsert(){
		
	}

	protected function execUpdate(){

	}

	protected function execDelete(){
		$sql = "DELETE "
			.  " FROM `" . $this->from . "`"
			. $this->where
			. ";";
		;
		var_dump($sql);exit;

	}

	public static function setDsn($dsn) {
		self::$dsn = $dsn;
	}

	public static function setUsername($username) {
		self::$username = $username;
	}

	public static function setPassword($password) {
		self::$password = $password;
	}

	public static function setOptions(array $options) {
		foreach ($options as $key => $value) {
			$method = 'set'. ucfirst($key);
			self::$method($value);
		}
	} 
}