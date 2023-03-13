<?php
declare(strict_types=1);

namespace models\MailClient\BuiltinClient;
use models\MailClient\interfaces\IBuiltinClient;

class BuiltinClient implements IBuiltinClient {
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