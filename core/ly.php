<?php
namespace core;

/**
* class core
*/
class ly
{

    public static $classMap = array();

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
        // 限制类只加载一次
        if (in_array($class, self::$classMap))
        {
            return true;
        }
        else
        {
            $class = str_replace('\\', '/', $class);
            $file = ROOT . '/../' . $class . '.php';
            if (is_file($file))
            {
                include $file;
                self::$classMap[$class] = $class;
            }
            else
            {
                return false;
            }
        }

	}

}