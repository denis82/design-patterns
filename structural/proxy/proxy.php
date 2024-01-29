<?php

namespace Structural\Proxy;

interface Worker
{
    public function closetHours($hours);
    public function countSalary(): int;
}

class WorkerOvertime implements Worker
{
    private array $_hours = [];

    public function closetHours($hours): void
    {
        $this->_hours[] = $hours;
    }

    public function countSalary(): int
    {
        return array_sum($this->_hours) * 500;
    }
}

class WorkerProxy extends WorkerOvertime implements Worker
{
    private int $_salary = 0;

    public function countSalary(): int
    {
        if ($this->_salary === 0) {
            $this->_salary = parent::countSalary();
        }
        return $this->_salary;
    }
}


$workerProxy = new WorkerProxy();
$workerProxy->closetHours(10);
var_dump($workerProxy->countSalary());
