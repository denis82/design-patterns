<?php

namespace Structural\Flyweight;

interface Mail
{
    public function render(): string;
}

abstract class TypeMail
{
    private string $_text;

    public function __construct(string $text)
    {
        $this->_text = $text;
    }

    public function getText(): string
    {
        return $this->_text;
    }
}

class BusinessMail extends TypeMail implements Mail
{
    public function render(): string
    {
        return $this->getText() . 'from business mail';
    }
}

class JobMail extends TypeMail implements Mail
{
    public function render(): string
    {
        return $this->getText() . 'from job mail';
    }
}


class MailFactory
{
    private array $_pool = [];

    public function getMail($id, $typeMail): Mail
    {
        if (!isset($this->_pool[$id])) {
            $this->_pool[$id] = $this->make($typeMail);
        }
        return $this->_pool[$id];
    }

    private function make($typeMail): Mail
    {
        if ($typeMail === 'business') {
            return new BusinessMail('business text');
        }
        return new JobMail('job text');
    }
}


$mailFactory = new MailFactory();
$mail = $mailFactory->getMail(10, 'business');
var_dump($mail->render());
