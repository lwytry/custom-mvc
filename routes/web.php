<?php
/**
 * Created by PhpStorm.
 * User: lwy
 * Date: 2018/2/12
 * Time: 14:01
 */
namespace routes;

use core\lib\conf;

/**
 * Class web
 * @package routes
 * 隐藏index.php 文件
 * 获取rul参数部分
 * 返回对应控制器和方法
 */

class web
{
    public $ctrl;
    public $action;

    public function __construct()
    {
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            $path = substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],'?'));
            $patharr = explode('/', trim($path, '/'));

            if (isset($patharr[0])) {
                $this->ctrl = $patharr[0];
                unset($patharr[0]);
            }

            if (isset($patharr[1])) {
                $this->action = $patharr[1];
                unset($patharr[1]);
            } else {
                $this->action = conf::get('action', 'route');
            }

            // url 多余部分转换为参数
            $count = count($patharr) + 2;
            $i = 2;
            while ($i<$count) {
                if (isset($patharr[$i])) {

                    $_GET[$patharr[$i]] = $patharr[$i+1];
                    $i = $i + 2;
                }
            }
        } else {
            $this->ctrl = conf::get('ctrl', 'route');
            $this->action = conf::get('action', 'route');
        }

    }
}