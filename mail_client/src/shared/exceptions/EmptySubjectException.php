<?php

declare(strict_types=1);

namespace mcl\shared\exceptions;

class EmptySubjectException extends \Exception 
{
    protected $errMessage = "The subject of your email is empty. Please provide any email subject and try again";

    public function __construct() {
        parent::__construct($this->errMessage);
    }

    public function message() {
        return parent::getMessage();
    }
}