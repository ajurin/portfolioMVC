<?php
namespace App\Models\Mappers;
use \My\Database\PDO as DB;

class Work
{
	/**
	 * TODO
	 * @param unknown $id
	 * @return \App\Models\Training
	 */
	public function find($id){
		$user = new \App\Models\Work;
	
		return $user;
	}
	
	/**
	 * TODO
	 * @param \App\Models\Training $training
	 */
	public function save(\App\Models\Work $work){
	
	}
	
	/**
	 * TODO
	 * @param \App\Models\Training $training
	 */
	public function delete(\App\Models\Work $work){
	
	}
	
	
	public function getList() {
		$pdo = DB::getInstance();
	
		$pdo->select('*')
		->from('career')
		->where('type = ?', 1);
	
		$res = $pdo->execute();
		$list = array();
		foreach ( $res as $data ){
			$work = new \App\Models\Work($data['title'], $data['url_img'], $data['description']);
			$list[] = $work;
		}
		return $list;
	}
}