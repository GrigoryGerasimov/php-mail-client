<?php

declare(strict_types=1);

namespace mcl\models\MailClient\interfaces;

interface BuiltinClientInterface 
{
    public function send(string $to, string $subject, string $message): void;
}