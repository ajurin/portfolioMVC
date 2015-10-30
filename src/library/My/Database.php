<?php

namespace My;

abstract class Database {
	
	protected static $instance;

	public static function getInstance(){

		if(!self::$instance instanceof self){
			self::$instance = new static;
		}

		return self::$instance;
	}

	abstract public function select($why);

	abstract public function from($from);

	abstract public function where($where);

	abstract public function insert(array $data);

	abstract public function update(array $data);

	abstract public function delete();
}