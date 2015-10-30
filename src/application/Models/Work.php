<?php

namespace App\Models;

class Work
{
	protected $title;
	protected $urlImg;
	protected $description;

	public function __construct($title, $urlImg, $description)
	{
		$this->title = $title;
		$this->urlImg = $urlImg;
		$this->description = $description;
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
	
	public function getUrlImg()
	{
		return $this->urlImg;
	}
	
	public function setUrlIme($urlImg)
	{
		$this->urlImg = $urlImg;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}
}