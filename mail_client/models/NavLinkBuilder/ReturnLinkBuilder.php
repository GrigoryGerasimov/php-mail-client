<?php
declare(strict_types=1);

namespace models\NavLinkBuilder;

class ReturnLinkBuilder extends NavLinkBuilder {
    public $scheme;
    private $host;
    private $uri;

    public function __construct($scheme, $host, $uri) {
        $this->scheme = $scheme;
        $this->host = $host;
        $this->uri = $uri;
    }

    public function __destruct() {
        unset($this->scheme);
        unset($this->host);
        unset($this->uri);
    }

    public function build(string $pageBaseName): string {
        $requestUri = $this->scheme."://".$this->host.$this->uri;
        return substr($requestUri, 0, stripos($requestUri, $pageBaseName));
    }
}