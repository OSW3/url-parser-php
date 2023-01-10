<?php
namespace OSW3\UrlParser\Components;

use OSW3\UrlParser\Components\Host;
use OSW3\UrlParser\Components\AbstractComponent;

class Tld extends AbstractComponent
{
    protected function parser(): array
    {
        $host = $this->getHost();

        $exp = explode(".", $host); array_shift($exp);
        $subject = implode(".", $exp);

        return $this->standardParser($subject);
    }

    private function getHost(): ?string
    {
        return (new Host($this->url))->info('subject');
    }
}