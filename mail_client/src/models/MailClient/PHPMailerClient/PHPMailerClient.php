<?php
declare(strict_types=1);

namespace models\MailClient\PHPMailerClient;
use models\MailClient\interfaces\IPHPMailerClient;

class PHPMailerClient implements IPHPMailerClient {
    public static function send(string $from, string $to, string $replyTo, string $cc, string $bcc, string $subject, string $message): void {
        
    }
}