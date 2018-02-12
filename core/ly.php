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
		$route = new \routes\web();
	}

	static function  load($class)
	{
	    // 自动加载类库
        $class = str_replace('\\', '/', $class);
		include ROOT . '/../' . $class . '.php';
	}

}