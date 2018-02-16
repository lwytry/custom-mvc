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
        $dsn = 'mysql:host=localhost;dbname=glass';
        $username = 'root';
        $passwd = '';
        try{
            parent::__construct($dsn, $username, $passwd);
        }catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }
}