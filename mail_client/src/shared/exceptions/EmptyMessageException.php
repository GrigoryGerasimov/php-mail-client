<?php

declare(strict_types=1);

namespace mcl\shared\exceptions;

class EmptyMessageException extends \Exception 
{
    protected $errMessage = "The body of your email is empty. Please provide any message to be sent via email and try again";

    public function __construct() {
        parent::__construct($this->errMessage);
    }

    public function message() {
        return parent::getMessage();
    }
}