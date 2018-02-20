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
	    // 加载日志类
        \core\lib\log::init();
        \core\lib\log::log($_SERVER, 'custom');
	    // 加载路由类
		$route = new \routes\web();
		// 加载控制器
        $ctrl = $route->ctrl;
        $action = $route->action;
        self::parse($ctrl, $action);
	}

	/*
	 * 加载控制器
	 */
    static public function parse($ctrl, $action) {
	    $ctrlfile = APP . '/controllers/web/home/' . ucfirst($ctrl) . 'Controller.php';
        $ctrlclass = '\\app\\Controllers\\Web\\Home\\' . ucfirst($ctrl) . 'Controller';

	    if (is_file($ctrlfile)) {
            include $ctrlfile;
            $ctrl = new $ctrlclass;
            $ctrl->$action();
        } else {
	        throw new \Exception('控制器' . $ctrl . '找不到');
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
            $loader = new \Twig_Loader_Filesystem(APP . '/views');
            $twig = new \Twig_Environment($loader, array(
                'cache' => DOC . '/cache/template',
                'debug' => DEBUG
            ));

            $template = $twig->load('index.html');
            $template->display($this->assign?$this->assign:'');
        }
    }

}