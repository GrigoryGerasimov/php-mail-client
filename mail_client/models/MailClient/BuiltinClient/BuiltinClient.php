<?php
declare(strict_types=1);

namespace models\MailClient\BuiltinClient;
use models\MailClient\interfaces\IMailClient;

class BuiltinClient implements IMailClient {
    private $headers;
    private $params;

    public function __construct(mixed $headers, string $params) {
        $this->headers = $headers;
        $this->params = $params;
    }

    public function __destruct() {
        unset($this->headers);
        unset($this->params);
    }

    public function send(string $to, string $subject, string $message): void {
        mail($to, $subject, $message, $this->headers, $this->params);
    }
}