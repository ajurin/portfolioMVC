<?php

namespace App\Models;

class Job extends Career
{
	protected $company;
	protected $description = array();
	
	
	
	
	public function __construct($title, $dateStart, $dateEnd, $town, $company, $description)
	{
		parent::__construct($title, $dateStart, $dateEnd, $town);
		$this->company = $company;
		$this->description = $this->setDescription($description);
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
	
	public function getCompany()
	{
		return $this->company;
	}
	
	public function setCompany($company) 
	{
		$this->company = $company;
		return $this;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	public function toStringDescription()
	{
		return implode('_', $this->description);
	}
	public function setDescription($description) 
	{
		$this->description = explode('_', $description);
		return $this;
	}

}