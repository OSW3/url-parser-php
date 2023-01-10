<?php
namespace OSW3\UrlParserPhp\Components;

use OSW3\UrlParserPhp\Helper;
use OSW3\UrlParserPhp\Components\Authority;
use OSW3\UrlParserPhp\Components\AbstractComponent;

class Port extends AbstractComponent
{
    protected function parser(): array
    {
        $response = Helper::DEFAULT_RESPONSE;

        $authority = $this->getAuthority();
        $exp = explode("@", $authority);
        $subject = end($exp);

        if ($pos = strpos($subject, ":"))
        {
            $subject = substr($subject, $pos + 1);
            $response = $this->standardParser($subject);
        }
        
        unset($response['hash']);
        unset($response['length']);
        return $response;
    }

    private function getAuthority(): ?string
    {
        return (new Authority($this->url))->info('subject');
    }
}