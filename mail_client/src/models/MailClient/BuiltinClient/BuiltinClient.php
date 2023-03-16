<?php

declare(strict_types=1);

namespace mcl\models\MailClient\BuiltinClient;

use mcl\models\MailClient\interfaces\BuiltinClientInterface;

class BuiltinClient implements BuiltinClientInterface
{
    private $headers;

    public function __construct(mixed $headers) {
        $this->headers = $headers;
    }

    public function __destruct() {
        unset($this->headers);
    }

    public function send(string $to, string $subject, string $message): void {
        mail($to, $subject, $message, $this->headers);
    }
}