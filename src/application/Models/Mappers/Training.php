<?php
namespace App\Models\Mappers;
use My\Database\PDO as DB;

class Training
{
	/**
	 * TODO
	 * @param unknown $id
	 * @return \App\Models\Training
	 */
	public function find($id){
		$user = new \App\Models\Training;
		
		return $user;
	}
	
	/**
	 * TODO
	 * @param \App\Models\Training $training
	 */
	public function save(\App\Models\Training $training){
		
	}
	
	/**
	 * TODO
	 * @param \App\Models\Training $training
	 */
	public function delete(\App\Models\Training $training){
		
	}

	
	public function getList() {
		$pdo = DB::getInstance();
		
		$pdo->select('*')
			->from('career')
			->where('type = ?', 1);
		
		$res = $pdo->execute();
		$list = array();
		foreach ( $res as $data ){
			$training = new \App\Models\Training($data['title'], $data['date_start'], $data['date_end'], $data['town'], $data['school']);
			$list[] = $training;
		}
		return $list;
	}
}
