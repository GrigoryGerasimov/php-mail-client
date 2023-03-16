<?php

declare(strict_types=1);

namespace mcl\models\MailClient;

use mcl\models\MailClient\BuiltinClient\BuiltinClient;
use mcl\models\MailClient\PHPMailerClient\PHPMailerClient;
use \PHPMailer\PHPMailer\PHPMailer;
use mcl\shared\exceptions\{InvalidMailException, EmptySubjectException, EmptyMessageException};

final class MailClient 
{
    protected $clientType;
    protected $to;
    protected $from;
    protected $replyTo;
    protected $cc;
    protected $bcc;
    protected $subject;
    protected $message;

    private $headers;

    final public function __construct(ClientTypesEnum $type, array|object $mailData) {
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
        if (ClientTypesEnum::BUILT_IN) {
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

    public function getCurrentClientType(): ClientTypesEnum {
        return $this->clientType;
    }

    private function validateData() {
        if (!isset($this->to) || trim($this->to) === "" || !isset($this->from) || trim($this->from) === "") {
            throw new InvalidMailException();
        } elseif (!isset($this->subject) || trim($this->subject) === "") {
            throw new EmptySubjectException();
        } elseif (!isset($this->message) || trim($this->message) === "") {
            throw new EmptyMessageException();
        }
    }

    public function trigger(): void {
        try {
            $this->validateData();
            switch ($this->clientType) {
                case ClientTypesEnum::BUILT_IN: {
                    $builtIn = new BuiltinClient($this->headers);
                    $builtIn->send($this->to, $this->subject, $this->message);
                };
                case ClientTypesEnum::THIRD_SIDE: {
                    $phpMailer = new PHPMailerClient(new PHPMailer());
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
        } catch(\Throwable $e) {
            throw $e;
        }
    }
}