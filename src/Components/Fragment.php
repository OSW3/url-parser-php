<?php
namespace OSW3\UrlParser\Components;

use OSW3\UrlParser\Helper;
use OSW3\UrlParser\Components\AbstractComponent;

class Fragment extends AbstractComponent
{
    protected function parser(): array
    {
        $response = array_merge(Helper::DEFAULT_RESPONSE, [
            'identifier' => null,
            'parameters' => array(
                'size' => 0,
                'entries' => array(),
            ),
        ]);

        $url = str_replace("&amp;", Helper::QUERY_SEPARATOR, $this->url);
        $delimiters = $this->queryDelimiters($url, Helper::FRAGMENT_IDENTIFIER);

        if ( $delimiters['start'] > 0 && $delimiters['end'] > 0)
        {
            $subject = substr($url, $delimiters['start'], $delimiters['end']);
            $parameters = $this->parseParameters(substr($subject, 1));
            
            $response = $this->standardParser($subject, [
                'identifier' => Helper::FRAGMENT_IDENTIFIER,
                'parameters' => array(
                    'size' => count($parameters),
                    'entries' => $parameters,
                ),
            ]);
        }

        return $response;
    }
}