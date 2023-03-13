<?php
declare(strict_types=1);

namespace models\MailClient;
use models\MailClient\BuiltinClient\BuiltinClient;
use models\MailClient\PHPMailerClient\PHPMailerClient;

final class MailClient {
    protected $clientType;
    protected $to;
    protected $from;
    protected $replyTo;
    protected $cc;
    protected $bcc;
    protected $subject;
    protected $message;

    private $headers;

    final public function __construct(ClientTypes $type, array|object $mailData) {
        $this->clientType = $type;
        [
            "to" => $this->to,
            "from" => $this->from,
            "replyTo" => $this->replyTo,
            "cc" => $this->cc,
            "bcc" => $this->bcc,
            "subject" => $this->subject,
            "message" => $this->message
        ] = $mailData;
        if (ClientTypes::BUILT_IN) {
            $this->headers = [
                "From" => $this->from,
                "CC" => $this->cc,
                "X-Sender" => $this->from,
                "X-Mailer" => "PHP/".phpversion(),
                "X-Priority" => "1",
                "Return-Path" => "test@test.com",
                "MIME-Version" => "1.0",
                "Content-Type" => "text-html; charset=iso-8859-1"
            ];
        }
    }

    public function __destruct() {
        unset($this->clientType);
    }

    private function __clone() {}

    public function getCurrentClientType(): ClientTypes {
        return $this->clientType;
    }

    public function trigger(): void {
        switch ($this->clientType) {
            case ClientTypes::BUILT_IN: {
                $builtIn = new BuiltinClient($this->headers);
                $builtIn->send($this->to, $this->subject, $this->message);
            };
            case ClientTypes::THIRD_SIDE: {
                $phpMailer = new PHPMailerClient();
                $phpMailer->send(
                    $this->from,
                    $this->to,
                    $this->replyTo,
                    $this->cc,
                    $this->bcc,
                    $this->subject,
                    $this->message
                );
            };
        }
    }
}