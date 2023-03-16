<?php

declare(strict_types=1);

namespace mcl\models\NavLinkBuilder\interfaces;

interface LinkBuilderInterface 
{
    public function build(string $pageBaseName);
}