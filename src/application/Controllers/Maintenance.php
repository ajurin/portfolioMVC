<?php

namespace App\Controllers;

class Maintenance extends \My\Controller
{
	public function action(){
		$this->view->message = "Mon portfolio est en maintenance veuillez m'excusez du dérangement.";
	}
}