<?php

declare(strict_types=1);

error_reporting(E_ALL);

require_once("../vendor/autoload.php");

use mcl\models\NavLinkBuilder\ReturnLinkBuilder;
use mcl\models\MailClient\{MailClient, ClientTypesEnum};
use mcl\shared\exceptions\{InvalidMailException, EmptySubjectException,EmptyMessageException};

[
    "REQUEST_SCHEME" => $REQUEST_SCHEME,
    "HTTP_HOST" => $HTTP_HOST,
    "REQUEST_URI" => $REQUEST_URI
] = $_SERVER;

$navLinkBack = new ReturnLinkBuilder($REQUEST_SCHEME, $HTTP_HOST, $REQUEST_URI);

try {
    $mailClient = new MailClient(ClientTypesEnum::BUILT_IN, $_POST);
    $mailClient->trigger();
} catch (InvalidMailException | EmptySubjectException | EmptyMessageException $exception) {
    echo $exception->message();
    exit(1);
} catch (\Throwable $exception) {
    throw $exception;
}

function generalExceptionHandler(\Throwable $exception): string 
{
    return "Oops, the app has just crushed due to the following issue: ".$exception->getMessage();
};

set_exception_handler('generalExceptionHandler');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="keywords" content="mail, client, php">
        <meta name="description" content="Mail client in PHP">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Mail client in PHP</title>
    </head>
    <body class="w-screen h-screen flex flex-col justify-center items-center text-3xl">
        <h1 class="w-fit">Your email has been successfully sent!</h1>
        <a href="<?php echo $navLinkBack->build("sent.php")?>" class="w-fit my-[150px] self-center hover:font-semibold">Back</a>
    </body>
</html>