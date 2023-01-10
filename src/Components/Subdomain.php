<?php
namespace OSW3\UrlParser\Components;

use OSW3\UrlParser\Components\Host;
use OSW3\UrlParser\Components\Hostname;
use OSW3\UrlParser\Components\AbstractComponent;

class Subdomain extends AbstractComponent
{
    protected function parser(): array
    {
        $hostname = $this->getHostname();
        $host = $this->getHost();
        
        $subject = substr(str_replace($host, "", $hostname), 0, -1);
        
        return $this->standardParser($subject);
    }

    private function getHostname(): ?string
    {
        return (new Hostname($this->url))->info('subject');
    }

    private function getHost(): ?string
    {
        return (new Host($this->url))->info('subject');
    }
}