<?php
/**
 * Created by PhpStorm.
 * User: lwy
 * Date: 2018/2/16
 * Time: 21:30
 */
namespace core\lib;

class log
{
    /*
     * 1 确定日志的存储方式
     * 2 写日志
     */
    public static $class;

    public static function init()
    {
        // 确定存贮方式
        $dirve = config('log.dirve');
        $class = '\core\lib\drive\log\\' . $dirve;
        self::$class = new $class;

    }

    public static function log($message, $filename = 'log')
    {
        self::$class->log($message, $filename);
    }
}