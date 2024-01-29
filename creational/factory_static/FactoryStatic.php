<?php

namespace Behavioral\FactoryStatic;

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


class WorkerFactory
{
    private static function getClassWithNamespace($ClassName){
        $class = new \ReflectionClass(__class__);
        return implode('',[$class->getNamespaceName(),'\\', $ClassName]);
    }
    public static function make($workerTitle): ?Worker
    {
        $ClassName = self::getClassWithNamespace(strtoupper($workerTitle));

        if (class_exists($ClassName)) {
            return new $ClassName;
        }
        return null;
    }
}

$developer = WorkerFactory::make('developer');
$developer->work();
