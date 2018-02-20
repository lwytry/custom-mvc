<?php
/**
 * Created by PhpStorm.
 * User: lwy
 * Date: 2018/2/16
 * Time: 16:12
 */
namespace core\lib;

use Couchbase\Exception;

class conf
{
    public static $conf = array();

    public static function get($name, $file)
    {
        /*
         * 获取配置文件
         * 1.判断配置文件是否存在
         * 2.判断配置是否存在
         * 3.缓存配置
         */
        if (self::$conf[$file]) {
            if (self::$conf[$file][$name]) {
                return self::$conf[$file][$name];
            } else {
                throw new \Exception(" config not exists");
            }
        } else {
            $filepath = CORE . '/config/' . $file . '.php';

            if(is_file($filepath)) {
                $conf = include $filepath;
                if ($conf[$name]) {
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception(" config not exists");
                }
            } else {
                throw new \Exception("config file not exists");
            }

        }

    }
}