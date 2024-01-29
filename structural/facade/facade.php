<?php

namespace Structural\Facade;

class WorkerFacade
{
    private Developer $_developer;
    private Designer $_designer;

    public function __construct(Developer $developer, Designer $designer)
    {
        $this->_developer = $developer;
        $this->_designer = $designer;
    }

    public function startWork(): void
    {
        $this->_developer->startDevelop();
        $this->_designer->startDesign();
    }

    public function stopWork(): void
    {
        $this->_developer->stopDevelop();
        $this->_designer->stopDesign();
    }
}

class Developer
{
    public function startDevelop(): void
    {
        printf('start Develop' . PHP_EOL);
    }
    public function stopDevelop(): void
    {
        printf('stop Develop' . PHP_EOL);
    }
}

class Designer
{
    public function startDesign(): void
    {
        printf('start Design' . PHP_EOL);
    }
    public function stopDesign(): void
    {
        printf('stop Design' . PHP_EOL);
    }
}


$developer = new Developer();
$designer = new Designer();

$workerFacade = new WorkerFacade($developer, $designer);

$workerFacade->stopWork();
