<?php
namespace OSW3\UrlParserPhp\Components;

use OSW3\UrlParserPhp\Helper;
use OSW3\UrlParserPhp\Components\Scheme;
use OSW3\UrlParserPhp\Components\AbstractComponent;

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