<?php

namespace App\Models;

abstract class Career
{
	protected $title;
	protected $dateStart;
	protected $dateEnd;
	protected $town;
	
	
	
	
	protected function __construct($title, $dateStart, $dateEnd, $town)
	{
		$this->title = $title;
		$this->dateStart = $this->dateFR($dateStart);
		$this->dateEnd = $this->dateFR($dateEnd);
		$this->town = $town;		
	}
	
	
	
	
	protected function dateFR($date)
	{
		list($year, $month, $day) = explode('-', $date);
		$date = "$day-$month-$year";
		return $date;
	}
	
	protected function dateEN($date)
	{
		list($day, $month, $year) = explode('-', $date);
		$date = "$year-$month-$day";
		return $date;
	}
	
	public static function dateMY($date){
		list($day, $month, $year) = explode('-', $date);
		$date = "$month-$year";
		return $date;
	}
	
	public function getDate(){
		$dateS = modifDate($this->getDateStart());
		$dateE = modifDate($this->getDateEnd());
		
		if ($dateS == $dateE){
			$date =  str_replace('-', '/', $dateS);
			return  $date;
		} else {
			$date = str_replace('-', '/', $dateS) . ' - ' . str_replace('-', '/', $dateE);
			return $date;
		}
		
	}
}