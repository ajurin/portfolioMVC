<?php
namespace App\Models\Mappers;
use My\Database\PDO as DB;

class Work {

	/**
	 * TODO
	 * @param integer $id
	 * @return \App\Models\Work
	 */
	public function find($id){
		$work = new \App\Models\Work;

		return $work;
	}

	/**
	 * TODO
	 * @param \App\Models $work
	 */
	public function save(\App\Models\Work $work){
			
	}

	/**
	 * TODO
	 * @param \App\Models $work
	 */
	public function delete(\App\Models\Work $work){

	}


	public function getList(){
		$pdo = DB::getInstance();

		$pdo->select('*')
			->from('works');

		$res = $pdo->execute();

		$list = array();

		foreach ($res as $data)
		{
			$list[] = new \App\Models\Work($data['title'], $data['urlImg'], $data['description']);
		}
		return $list;
	}
}