<?php

class ControllerConfiguration
{
    private string $_name;
    private string $_action;

    public function __construct(string $name, string $action)
    {
        $this->_name = $name;
        $this->_action = $action;
    }

    public function getName(): string
    {
        return $this->_name;
    }
    public function getAction(): string
    {
        return $this->_action;
    }
}

class Controller
{
    private ControllerConfiguration $_controllerConfiguration;

    public function __construct(ControllerConfiguration $controllerConfiguration)
    {
        $this->_controllerConfiguration = $controllerConfiguration;
    }

    public function geConfiguration(): string
    {
        return $this->_controllerConfiguration->getName() . '@'. $this->_controllerConfiguration->getAction();
    }
}


$configuration = new ControllerConfiguration('PostController', 'index');

$controller = new Controller($configuration);

var_dump($controller->geConfiguration());