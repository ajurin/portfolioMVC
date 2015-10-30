<?php

namespace App\Models;

class Skill
{
	protected $title;
	protected $urlImg;
	
	public function __construct($title, $urlImg)
	{
		$this->title = $title;
		$this->urlImg = $urlImg;
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
	
	public function setUrlImg($urlImg)
	{
		$this->urlImg =$urlImg;	
		return $this;
	}
}