<?php
namespace OSW3\UrlParser\Components;

use OSW3\UrlParser\Helper;
use OSW3\UrlParser\Components\Authority;
use OSW3\UrlParser\Components\AbstractComponent;

class Password extends AbstractComponent
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
            {
                $subject = substr($subject, $pos + 1);
                $response = $this->standardParser($subject);
            }
        }

        return $response;
    }

    private function getAuthority(): ?string
    {
        return (new Authority($this->url))->info('subject');
    }
}