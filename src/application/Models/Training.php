<?php

namespace App\Models;

class Training extends Career
{
	protected $school;
	
	
	
	
	public function __construct($title, $dateStart, $dateEnd, $town, $school)
	{
		parent::__construct($title, $dateStart, $dateEnd, $town);
		$this->school = $school;
	}
	
	
	
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}
	
	public function getDateStart()
	{
		return $this->dateStart;
	}
	
	public function setDateStart($dateStart)
	{
		$this->dateStart = $dateStart;
		return $this;
	}
	
	public function getDateEnd()
	{
		return $this->dateEnd;
	}
	
	public function setDateEnd($dateEnd)
	{
		$this->dateEnd = $dateEnd;
		return $this;
	}
	
	public function getTown()
	{
		return $this->town;
	}
	public function setTown($town)
	{
		$this->town = $town;
		return $this;
	}
	
	public function getSchool()
	{
		return $this->school;
	}
	
	public function setSchool($school)
	{
		$this->school = $school;
		return $this;
	}
	

	
}