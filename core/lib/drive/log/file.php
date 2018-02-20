<?php
/**
 * Created by PhpStorm.
 * User: lwy
 * Date: 2018/2/16
 * Time: 21:34
 */
namespace core\lib\drive\log;

class file
{
    public $path;

    public function __construct()
    {
        $this->path = config('log.option.path');
    }

    /*
     * 1 确定文件是否存在 不存在则创建文件
     * 2 写入日志
     */
    public function log($message, $filename)
    {
        $path = $this->path;
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $filename = $path . $filename . date('Ymd'). '.log';
        $data[] = date('Y-m-d H:i:s');
        $data[] = $message['HTTP_USER_AGENT'];
        $data[] = $message['REMOTE_ADDR'];
        $data[] = $message['REQUEST_URI'];
        return file_put_contents($filename, json_encode($data) . PHP_EOL, FILE_APPEND);
    }
}
