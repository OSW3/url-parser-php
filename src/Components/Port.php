<?php
namespace OSW3\UrlParser\Components;

use OSW3\UrlParser\Helper;
use OSW3\UrlParser\Components\Scheme;
use OSW3\UrlParser\Components\Authority;
use OSW3\UrlParser\Components\AbstractComponent;

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

        if ($response['subject'] === null)
        {
            switch ($this->getScheme())
            {
                case 'ftp':   $subject = 21; break;
                case 'ssh':   $subject = 22; break;
                case 'https': $subject = 443; break;
                default:
                case 'http':  $subject = 80; break;
            }

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
    private function getScheme(): ?string
    {
        return (new Scheme($this->url))->info('subject');
    }
}