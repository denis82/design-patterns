<?php

namespace Behavioral\FactoryMethod;

interface Worker
{
    public function work();
}


class Developer implements Worker
{
    public function work(){
        printf('i am developing');
    }
}

class Designer implements Worker
{
    public function work(){
        printf('i am designing');
    }
}


interface WorkerFactory
{
    public static function make();
}


class DeveloperFactory  implements WorkerFactory
{
    public static function make()
    {
        return new Developer();
    }
}

class DesignerFactory  implements WorkerFactory
{
    public static function make()
    {
        return new Designer();
    }
}


$developer = DeveloperFactory::make();
$designer = DesignerFactory::make();

$designer->work();