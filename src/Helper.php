<?php 
namespace OSW3\UrlParserPhp;

class Helper
{
    public const SCHEME_IDENTIFIER = "://";
    public const FRAGMENT_IDENTIFIER = "#";
    public const QUERY_IDENTIFIER = "?";
    public const QUERY_SEPARATOR = "&";


    public const DEFAULT_RESPONSE = array(
        'subject' => null,
        'hash' => null,
        'length' => 0,
        'positions' => array(
            'start' => null,
            'end' => null,
        ),
    );
}
