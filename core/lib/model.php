<?php
/**
 * Created by PhpStorm.
 * User: lwy
 * Date: 2018/2/16
 * Time: 14:46
 */
namespace core\lib;

class model extends \Medoo\Medoo
{
    public function __construct()
    {
        $options = config('databases');
        parent::__construct($options);
    }
}