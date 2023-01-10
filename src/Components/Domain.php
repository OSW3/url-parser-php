<?php
namespace OSW3\UrlParser\Components;

use OSW3\UrlParser\Components\Host;
use OSW3\UrlParser\Components\AbstractComponent;

class Domain extends AbstractComponent
{
    protected function parser(): array
    {
        $exp = explode(".", $this->getHost());
        $subject = array_shift($exp);
        
        return $this->standardParser($subject);
    }

    private function getHost(): ?string
    {
        return (new Host($this->url))->info('subject');
    }
}