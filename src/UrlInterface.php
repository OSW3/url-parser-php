<?php 
namespace OSW3\UrlParser;

final class UrlInterface
{
    private string|null $scheme = null;
    private string|null $protocol = null;
    private string|null $authority = null;
    private string|null $username = null;
    private string|null $password = null;
    private string|null $hostname = null;
    private string|null $host = null;
    private string|null $tld = null;
    private string|null $domain = null;
    private string|null $subdomain = null;
    private string|null $port = null;
    private string|null $path = null;
    private string|null $query = null;
    private string|null $fragment = null;
}
