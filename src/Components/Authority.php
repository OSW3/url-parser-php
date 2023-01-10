<?php
namespace OSW3\UrlParser\Components;

use OSW3\UrlParser\Components\Protocol;
use OSW3\UrlParser\Components\AbstractComponent;

class Authority extends AbstractComponent
{
    protected function parser(): array
    {
        $subject = str_replace($this->getProtocol(), "", $this->url);

        if ($pos = strpos($subject, "/"))
            $subject = substr($subject, 0, $pos);
        
        return $this->standardParser($subject);
    }

    private function getProtocol(): ?string
    {
        return (new Protocol($this->url))->info('subject');
    }
}