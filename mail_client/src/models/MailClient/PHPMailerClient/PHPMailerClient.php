<?php

declare(strict_types=1);

namespace mcl\models\MailClient\PHPMailerClient;

use mcl\models\MailClient\interfaces\PHPMailerClientInterface;
use \PHPMailer\PHPMailer\PHPMailer;

class PHPMailerClient implements PHPMailerClientInterface 
{
    private static $mail = null;

    public function __construct(PHPMailer $phpmailer) {
        static::$mail = $phpmailer;
    }

    public static function setClientConfig(string $from, string $to, string $replyTo, string $cc, string $bcc, string $subject, string $message): void {
        static::$mail->setFrom($from);
        static::$mail->addAddress($to);
        static::$mail->addReplyTo($replyTo);
        static::$mail->addCC($cc);
        static::$mail->addBCC($bcc);
        static::$mail->Subject = $subject;
        if (static::hasHTMLContent()) {
            static::$mail->isHTML(true);
            static::$mail->Body = $message;
        } else static::$mail->AltBody = $message;
    }

    public static function send(string $from, string $to, string $replyTo, string $cc, string $bcc, string $subject, string $message): void {
        static::setClientConfig($from, $to, $replyTo, $cc, $bcc, $subject, $message);
        if (isset(static::$mail) && !is_null(static::$mail)) {
            static::$mail->send();
        }
    }

    public static function hasHTMLContent(bool $hasHTML = false): bool {
        return $hasHTML;
    }
}