<?php
namespace My;

class Dispatcher 
{
	/*
	 * @var $request \My\Request 
	 */
	private $request;
	/*
	 * @var $response \My\Response 
	 */
	private $response;


	public function __construct(\My\Request $request, \My\Response $response) 
	{
		$this->request = $request;
		$this->response = $response;
	}
	/**
	 *
	 if ($lastNsPos = strrpos($className, '\\')) {
	 $namespace = substr($className, 0, $lastNsPos);
	 $className = substr($className, $lastNsPos + 1);
	 */
	public function dispatch()
	{
		$pageValid = false;
		$controllerFile = ROOT_PATH . '/application/Controllers/';
		$controllerClass = '\App\Controllers\\';
		$route = $this->request->getRoute();
		
		if(strripos($route, 'admin')!==false)
		{
			if($pos = strripos($route, '/'))
			{
				$namespace = substr($route, 0, $pos);
				$className = substr($route, $pos + 1);
				$controllerFile .= ucfirst($namespace) . DIRECTORY_SEPARATOR . ucfirst($className). '.php';
				$controllerClass .= ucfirst($namespace) . DIRECTORY_SEPARATOR . ucfirst($className);
				$controllerClass = str_replace('/', '\\', $controllerClass);
			}
		} else {
			$controllerFile .= ucfirst($this->request->getRoute()) . '.php';
			$controllerClass .= ucfirst($this->request->getRoute());
		}
		
		if (file_exists($controllerFile))
		{
			$pageValid = true;
		}
 
		if (!$pageValid)
		{
			$this->request->setRoute('error');
			$this->response->setHttpResponseCode(404);
			$controllerClass = '\App\Controllers\Error';
		}

		$controller = new $controllerClass($this->request, $this->response); // Instanciation dynamique
		$controller->run();

	}
	
	public function setAdmin($admin)
	{
		$this->admin = $admin;
		return $this;
	}
}