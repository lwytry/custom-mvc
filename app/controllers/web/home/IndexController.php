<?php
namespace app\Controllers\Web\Home;

class IndexController extends \core\ly {
    public function __construct()
    {
    }

    public function index() {
        echo "<h1>wellcome! </h1>";
        // 使用数据库
        $model = new \core\lib\model();
        $sql = "select * from abroad_cases where id < 10";
        $ret = $model->query($sql);
        dd($ret->fetchAll());
    }

    public function showView() {
        // 视图类
        $data = "welcom custom";
        $this->assign('data', $data);
        $this->assign('title', '视图文件');
        $this->display('index.html');
    }

    public function conf() {
//        $ret = \core\lib\conf::get('ctrl', 'route');
//        $ret = \core\lib\conf::get('action', 'route');
//        dd($ret);
        $ret = config('databases.dsn');
        dd($ret);
    }
}