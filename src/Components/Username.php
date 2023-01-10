<?php
namespace OSW3\UrlParserPhp\Components;

use OSW3\UrlParserPhp\Helper;
use OSW3\UrlParserPhp\Components\Authority;
use OSW3\UrlParserPhp\Components\AbstractComponent;

class Username extends AbstractComponent
{
    protected function parser(): array
    {
        $response = Helper::DEFAULT_RESPONSE;

        $authority = $this->getAuthority();
        $exp = explode("@", $authority);

        if (count($exp) >= 2)
        {
            $subject = $exp[0];

            if ($pos = strpos($subject, ":"))
                $subject = substr($subject, 0, $pos);
    
            $response = $this->standardParser($subject);
        }

        return $response;
    }

    private function getAuthority(): ?string
    {
        return (new Authority($this->url))->info('subject');
    }
}