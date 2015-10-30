<?php
$env = getenv('ENV');

//chemins importans de l'arbo
define('ROOT_PATH', dirname(__DIR__));
define('LIB_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'library');
define("VIEW_PATH", ROOT_PATH . '/application/Views');
define("LAYOUT_PATH", ROOT_PATH . '/application/Layouts');

//Ajoute les chemin nécessaires dans l'include path : library, root, ...
set_include_path( '.' . PATH_SEPARATOR . LIB_PATH . PATH_SEPARATOR . ROOT_PATH);

// Mise en place de l'autoload
require_once 'My/Autoloader.php';
spl_autoload_register(array('My\Autoloader', 'autoload'));

$config = new \My\Config(ROOT_PATH . '/application/Configs/application.ini', $env);
//\My\Database\PDO::setOptions($config->toArray('pdo'));
$res = $config->toArray('webmaster_email');
if(!empty($res)){
	define("WEBMASTER_EMAIL", $config->toArray('webmaster_email'));
	define("PUBLIC_FOLDER", $config->toArray('public_folder'));
} else {
	define("WEBMASTER_EMAIL", "contact@axelle-jurin.xyz");
	define("PUBLIC_FOLDER", "public_html");
}

// Code de l'application
$request = new \My\Request();
$response = new \My\Response();

// Routage
$router = new \My\Router($request);
$router->route();

// Dispatching
$dispatcher = new \My\Dispatcher($request, $response);
$dispatcher->dispatch();

//Envoi de la réponse
$response->send();