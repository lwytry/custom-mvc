<?php
/**
 * Created by PhpStorm.
 * User: lwy
 * Date: 2018/2/16
 * Time: 14:46
 */
namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
        $dsn = config('databases.dsn');
        $username = config('databases.username');
        $passwd = config('databases.passwd');
        try{
            parent::__construct($dsn, $username, $passwd);
        }catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }
}