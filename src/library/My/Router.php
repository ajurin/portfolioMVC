<?php
namespace My;

class Router 
{
	/*
	 * $request \My\Request 
	 */
	private $request;
	private $admin = 'adaxou69';

	public function __construct(\My\Request $request) 
	{
		$this->request = $request;
	}
	
	public function route() 
	{
		$uriPath = parse_url($this->request->getUrl(), PHP_URL_PATH);
		$route = trim($uriPath, '/');		

		if(strripos(strtolower($uriPath), $this->admin))
		{	
			$route = str_replace($this->admin, "admin", strtolower($route));
			$route = trim($route, '/');

			if ('admin' === $route || 'admin/' === $route){
				$route = trim($route, '/').'/home';
			}
		} else {			
			$route = strtolower($route);
			
			if ("" === $route || "index"===$route) {
				$route = 'homepage';
			}
		}
		
		$this->request->setRoute($route);
	}
	
	
public function getAdmin(){
		return $this->admin;
	}

	public function setAdmin($admin)
	{
		$this->admin = $admin;
		return $this;
	}
}