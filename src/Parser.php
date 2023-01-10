<?php 
namespace OSW3\UrlParser;

use OSW3\UrlParser\Components\Tld;
use OSW3\UrlParser\Components\Url;
use OSW3\UrlParser\Components\Host;
use OSW3\UrlParser\Components\Path;
use OSW3\UrlParser\Components\Port;
use OSW3\UrlParser\Components\Query;
use OSW3\UrlParser\Components\Domain;
use OSW3\UrlParser\Components\Scheme;
use OSW3\UrlParser\Components\Fragment;
use OSW3\UrlParser\Components\Hostname;
use OSW3\UrlParser\Components\Password;
use OSW3\UrlParser\Components\Protocol;
use OSW3\UrlParser\Components\Username;
use OSW3\UrlParser\Components\Authority;
use OSW3\UrlParser\Components\Subdomain;

class Parser
{
    public function parse(string $url, bool $asArray = false, bool $condensed = false)
    {
        $components = array(
            'url'       => new Url($url),
            'scheme'    => new Scheme($url),
            'protocol'  => new Protocol($url),
            'authority' => new Authority($url),
            'username'  => new Username($url),
            'password'  => new Password($url),
            'hostname'  => new Hostname($url),
            'host'      => new Host($url),
            'tld'       => new Tld($url),
            'domain'    => new Domain($url),
            'subdomain' => new Subdomain($url),
            'port'      => new Port($url),
            'path'      => new Path($url),
            'query'     => new Query($url),
            'fragment'  => new Fragment($url),
        );

        $response = array();

        foreach ($components as $name => $component) $response[$name] = $condensed 
            ? $component->info('subject') 
            : $component->info()
        ;

        return $asArray 
            ? $response 
            : json_decode(json_encode($response))
        ;
    }



    // public function addAlgorithm(string $algorithm): self
    // {
    //     array_push($this->algorithms, $algorithm);
        
    //     return $this;
    // }

}