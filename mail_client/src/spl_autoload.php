<?php

declare(strict_types=1);

function autoLoader(array|string $class): void 
{
    require_once(str_replace("\\", "/", $class).".php");
}

spl_autoload_register("autoLoader");