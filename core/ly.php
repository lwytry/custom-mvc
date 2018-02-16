<?php
namespace core;

/**
* class core
*/
class ly
{

    public static $classMap = array();
    public $assign;

	function __construct()
	{
		# code...
	}

	static public function run()
	{
	    // 加载路由类
		$route = new \routes\web();
		// 加载控制器
        $ctlr = $route->ctlr;
        $action = $route->action;
        self::parse($ctlr, $action);
	}

	/*
	 * 加载控制器
	 */
    static public function parse($ctlr, $action) {
	    $ctlrfile = APP . '/controllers/web/home/' . ucfirst($ctlr) . 'Controller.php';
	    $ctlrclass = '\\app\\Controllers\\Web\\Home\\' . ucfirst($ctlr) . 'Controller';
	    if (is_file($ctlrfile)) {
            include_once ($ctlrfile);
            $ctlr = new $ctlrclass;
            $ctlr->$action();
        } else {
	        throw new \Exception('控制器' . $ctlr . '找不到');
        }
    }

	static function  load($class)
	{
	    // 自动加载类库
        // 限制类只加载一次
        if (in_array($class, self::$classMap)) {
            return true;
        } else {
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

	/*
	 * 分配数据
	 */
    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    /*
     * 渲染模版
     */
    public function display($file)
    {
        $file = APP . '/views/' . $file;
        if (is_file($file)) {
            extract($this->assign);
            include($file);
        }
    }

}