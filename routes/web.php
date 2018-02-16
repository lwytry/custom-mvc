<?php
/**
 * Created by PhpStorm.
 * User: lwy
 * Date: 2018/2/12
 * Time: 14:01
 */
namespace routes;

/**
 * Class web
 * @package routes
 * 隐藏index.php 文件
 * 获取rul参数部分
 * 返回对应控制器和方法
 */

class web
{
    public $ctlr;
    public $action;

    public function __construct()
    {
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            $path = $_SERVER['REQUEST_URI'];
            $patharr = explode('/', trim($path, '/'));

            if (isset($patharr[0])) {
                $this->ctlr = $patharr[0];
                unset($patharr[0]);
            }

            if (isset($patharr[1])) {
                $this->action = $patharr[1];
                unset($patharr[1]);
            } else {
                $this->action = 'index';
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
            $this->ctlr = 'index';
            $this->action = 'index';
        }
    }
}