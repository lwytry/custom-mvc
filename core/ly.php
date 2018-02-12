<?php
namespace core;

/**
* class core
*/
class ly
{

	function __construct()
	{
		# code...
	}

	public function run()
	{
		$route = new core\lib\web();
	}

	static function  load($class)
	{
		include ROOT . '/../core' . $class . '.php';
	}

}
?>