<?php
namespace OSW3\UrlParser\Components;

use OSW3\UrlParser\Components\AbstractComponent;

class Url extends AbstractComponent
{
    protected function parser(): array
    {
        $response = $this->standardParser($this->url);
        unset($response['positions']);
        
        return $response;
    }
}