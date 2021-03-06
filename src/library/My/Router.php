<?php
namespace My;

class Router 
{
	/*
	 * $request \My\Request 
	 */
	private $request;

	public function __construct(\My\Request $request) 
	{
		$this->request = $request;
	}
	
	public function route() 
	{
		$uriPath = parse_url($this->request->getUrl(), PHP_URL_PATH);
		$route = trim($uriPath, '/');		

			
		$route = strtolower($route);
			
		if ("" === $route || "index"===$route) {
			$route = 'homepage';
		}
		
		$this->request->setRoute($route);
	}
}