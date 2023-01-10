<?php
namespace OSW3\UrlParser\Components;

use OSW3\UrlParser\Helper;
use OSW3\UrlParser\Components\Scheme;
use OSW3\UrlParser\Components\AbstractComponent;

class Protocol extends AbstractComponent
{
    protected function parser(): array
    {
        $response = Helper::DEFAULT_RESPONSE;

        if ($scheme = $this->getScheme()) 
        {
            $subject  = $scheme.Helper::SCHEME_IDENTIFIER;
            $response = $this->standardParser($subject);
        }

        return $response;
    }

    private function getScheme(): ?string
    {
        return (new Scheme($this->url))->info('subject');
    }
}