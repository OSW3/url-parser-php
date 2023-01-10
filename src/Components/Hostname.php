<?php
namespace OSW3\UrlParser\Components;

use OSW3\UrlParser\Components\Authority;
use OSW3\UrlParser\Components\AbstractComponent;

class Hostname extends AbstractComponent
{
    protected function parser(): array
    {
        $authority = $this->getAuthority();

        $exp = explode("@", $authority);
        $subject = end($exp);
        
        if ($pos = strpos($subject, ":"))
            $subject = substr($subject, 0, $pos);
        
        return $this->standardParser($subject);
    }

    private function getAuthority(): ?string
    {
        return (new Authority($this->url))->info('subject');
    }
}