<?php
	// 定义常量
	define('ROOT', __DIR__);
	// 项目核心文件
	define('CORE', ROOT . '/../core');
	define('APP', ROOT . '/../app');
	define('DEBUG', ture);

	// 加载函数库
	include CORE . '/comment/function.php';

	// 类的自动加载
	include CORE . '/ly.php';
	spl_autoload_register('core\ly::load');

	core\ly::run();
?>
