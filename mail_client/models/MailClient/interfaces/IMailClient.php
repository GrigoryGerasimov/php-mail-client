<?php
declare(strict_styles=1);

namespace models\MailClient\interfaces;

interface IMailClient {
    public function send(string $to, string $subject, string $message): void;
}