<?php
declare(strict_types=1);

namespace models\NavLinkBuilder;
use models\NavLinkBuilder\interfaces\ILinkBuilder;

abstract class NavLinkBuilder implements ILinkBuilder{
    abstract public function build(string $pageBaseName): string;
}