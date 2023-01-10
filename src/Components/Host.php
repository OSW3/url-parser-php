<?php
namespace OSW3\UrlParser\Components;

use OSW3\UrlParser\Components\Hostname;
use OSW3\UrlParser\Components\AbstractComponent;

class Host extends AbstractComponent
{
    protected function parser(): array
    {
        $hostname = $this->getHostname();

        $re = "/[a-z0-9\-]{1,63}\.[a-z\.]{2,6}$/";
        preg_match($re, $hostname, $matches);

        $subject    = isset($matches[0]) ? $matches[0] : "";

        return $this->standardParser($subject);
    }

    private function getHostname(): ?string
    {
        return (new Hostname($this->url))->info('subject');
    }
}