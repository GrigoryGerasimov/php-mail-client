<?php
declare(strict_types=1);

namespace models\MailClient\interfaces;

interface IBuiltinClient {
    public function send(string $to, string $subject, string $message): void;
}