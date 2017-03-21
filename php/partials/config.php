<?php

/**
 * Created by PhpStorm.
 * User: Sven de Ronde
 * Date: 20-3-2017
 * Time: 21:33
 */
class Config
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'keilewerf_interactive_map';

    public function connection() {
        return mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    }


}