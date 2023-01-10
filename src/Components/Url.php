<?php
namespace OSW3\UrlParserPhp\Components;

use OSW3\UrlParserPhp\Components\AbstractComponent;

class Url extends AbstractComponent
{
    protected function parser(): array
    {
        $response = $this->standardParser($this->url);
        unset($response['positions']);
        
        return $response;
    }
}