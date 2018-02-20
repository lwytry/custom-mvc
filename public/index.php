<?php
	// 定义常量
	define('ROOT', __DIR__);
	// 项目核心文件
	define('CORE', ROOT . '/../core');
	define('APP', ROOT . '/../app');
	define('DOC', ROOT . '/..');
	define('DEBUG', ture);

	// 引入vendor
    include DOC . '/../vendor/autoload.php';

	if (DEBUG) {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
		ini_set('diplay_error', 'On');
	}

	// 加载函数库
	include CORE . '/comment/function.php';

	// 类的自动加载
	include CORE . '/ly.php';
	spl_autoload_register('\core\ly::load');

	\core\ly::run();
