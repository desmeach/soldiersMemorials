<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/soldiers/vendor/autoload.php';

class_alias('\RedBeanPHP\R', '\R');
class Database
{
    private $userName = 'root', $password = '', $host = 'localhost', $port = '', $name;

    /**
     * __construct
     *
     * @param string $name name of database
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * openConnection
     *
     * @return void
     */
    public function openConnection()
    {
        R::setup("mysql:host=$this->host;port=$this->port;dbname=$this->name", $this->userName, $this->password);
    }

    /**
     * closeConnection
     *
     * @return void
     */
    public function closeConnection()
    {
        R::close();
    }
}