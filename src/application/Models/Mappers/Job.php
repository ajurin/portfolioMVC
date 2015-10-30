<?php
namespace App\Models\Mappers;
use My\Database\PDO as DB;

class Job
{
	/**
	 * TODO
	 * @param unknown $id
	 * @return \App\Models\Job
	 */
	public function find($id){
		$user = new \App\Models\Job;
		
		return $user;
	}
	
	/**
	 * TODO
	 * @param \App\Models\Job $job
	 */
	public function save(\App\Models\Job $job){
		
	}
	
	/**
	 * TODO
	 * @param \App\Models\Job $job
	 */
	public function delete(\App\Models\Job $job){
		
	}
	
	
	public function getList() {
		$pdo = DB::getInstance();
		
		$pdo->select('*')
			->from('career')
			->where('type = ?', 2);
		
		$res = $pdo->execute();
		$list = array();
		foreach ( $res as $data ){
			$job = new \App\Models\Job($data['title'], $data['date_start'], $data['date_end'], $data['town'], $data['company'], $data['description']);
			$list[] = $job;
		}
		return $list;
	}
}