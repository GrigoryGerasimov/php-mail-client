<?php

declare(strict_types=1);

namespace mcl\shared\exceptions;

class InvalidMailException extends \Exception 
{
    protected $errMessage = "Invalid email ids provided. Please kindly check and provide correct data";

    public function __construct() {
        parent::__construct($this->errMessage);
    }

    public function message() {
        return parent::getMessage();
    }
}