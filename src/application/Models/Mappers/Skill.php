<?php
namespace App\Models\Mappers;
use My\Database\PDO as DB;

class Skill {
	
	/**
	 * TODO
	 * @param integer $id
	 * @return \App\Models\Skill
	 */
	public function find($id){
		$skill = new \App\Models\Skill;
		
		return $skill;
	}
	
	/**
	 * TODO
	 * @param \App\Models $skill
	 */
	public function save(\App\Models\Skill $skill){
			
	}
	
	/**
	 * TODO
	 * @param \App\Models $skill
	 */
	public function delete(\App\Models\Skill $skill){
		
	}
	
	
	public function getList(){
		$pdo = DB::getInstance();
		
		$pdo->select('*')
			->from('skills');
		
		$res = $pdo->execute();
		
		$list = array();
		
		foreach ($res as $data)
		{
			$list[] = new \App\Models\Skill($data['title'], $data['urlImg']);
		}
		return $list;
	}
}