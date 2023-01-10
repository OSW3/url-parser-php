<?php
namespace OSW3\UrlParserPhp\Components;

use OSW3\UrlParserPhp\Helper;
use OSW3\UrlParserPhp\Components\AbstractComponent;

class Scheme extends AbstractComponent
{
    protected function parser(): array
    {
        $url = $this->url;

        $response = array_merge(Helper::DEFAULT_RESPONSE, [
            'identifier' => array(
                'symbol' => null, //self::SCHEME_IDENTIFIER,
                'length' => 0, //strlen(self::SCHEME_IDENTIFIER),
                'positions' => array(
                    'start' => null,
                    'end' => null,
                ),
            )
        ]);

        $url = str_replace("\\", "/", $url);

        if ($pos = strpos($url, Helper::SCHEME_IDENTIFIER))
        {
            $extract = substr($url, 0, $pos);
            $subject = strtolower($extract);

            $response = $this->standardParser($subject, [
                'identifier' => array(
                    'symbol' => Helper::SCHEME_IDENTIFIER,
                    'length' => strlen(Helper::SCHEME_IDENTIFIER),
                    'positions' => $this->positions($url, Helper::SCHEME_IDENTIFIER),
                )
            ]);
        }

        return $response;
    }
}