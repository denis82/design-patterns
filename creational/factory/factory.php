<?php

class Worker
{
    private string $_name;


    public function getName(): string
    {
        return $this->_name;
    }
    public function setName(string $name): void
    {
        $this->_name = $name;
    }
}


class WorkerFactory
{
    public static function make(): Worker
    {
        return new Worker();
    }
}


$worker = WorkerFactory::make();
$worker->setName('Foo');
var_dump($worker->getName());