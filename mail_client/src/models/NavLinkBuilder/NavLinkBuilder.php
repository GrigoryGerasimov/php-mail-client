<?php

declare(strict_types=1);

namespace mcl\models\NavLinkBuilder;

use mcl\models\NavLinkBuilder\interfaces\LinkBuilderInterface;

abstract class NavLinkBuilder implements LinkBuilderInterface
{
    abstract public function build(string $pageBaseName): string;
}