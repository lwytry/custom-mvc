<?php
namespace app\model;

use core\lib\model;

class order extends model
{
    public $tabel = "abroad_order";

    public function lists()
    {
        $ret = $this->select($this->tabel, '*');
        return $ret;
    }
}