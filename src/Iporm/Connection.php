<?php

namespace Iporm;

use Exception;

class Connection
{
    private static $_con;

    /**
     * Connect
     *
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $db
     */
    public static function connect($host = '', $username = '', $password = '', $db = '')
    {
        try {
            self::$_con = mysqli_connect($host, $username, $password, $db);
            self::$_con->set_charset("utf8");
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * getInstance
     *
     * @return object
     */
    public static function getInstance()
    {
        return self::$_con;
    }
}
