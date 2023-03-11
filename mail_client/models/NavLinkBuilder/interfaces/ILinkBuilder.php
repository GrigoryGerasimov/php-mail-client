<?php
declare(strict_types=1);

namespace models\NavLinkBuilder\interfaces;

interface ILinkBuilder {
    public function build(string $pageBaseName);
}