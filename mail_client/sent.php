<?php
declare(strict_types=1);
require_once("spl_autoload.php");

use models\NavLinkBuilder\ReturnLinkBuilder;

[
    "REQUEST_SCHEME" => $REQUEST_SCHEME,
    "HTTP_HOST" => $HTTP_HOST,
    "REQUEST_URI" => $REQUEST_URI
] = $_SERVER;

$navLinkBack = new ReturnLinkBuilder($REQUEST_SCHEME, $HTTP_HOST, $REQUEST_URI);
    
define("navLinkBack", $navLinkBack->build("sent.php"));

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
        <a href="<?php echo navLinkBack?>" class="w-fit my-[150px] self-center hover:font-semibold">Back</a>
    </body>
</html>