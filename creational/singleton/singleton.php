<?php

final class Connection
{
    private static ?self $instance = null;
    private static string $name;
    public static function getName()
    {
        return self::$name;
    }
    public static function setName($name)
    {
        self::$name = $name;
    }

    public static function getInstance(): self
    {
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __clone()
    {
        # code...
    }
    public function __wakeup()
    {
        # code...
    }
}

$connection = Connection::getInstance();
$connection::setName('new Name');

$connection2 = Connection::getInstance();
var_dump($connection::getName());