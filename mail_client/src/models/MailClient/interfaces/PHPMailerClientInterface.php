<?php

declare(strict_types=1);

namespace mcl\models\MailClient\interfaces;

interface PHPMailerClientInterface 
{
    public static function send(string $from, string $to, string $replyTo, string $cc, string $bcc, string $subject, string $message): void;
}