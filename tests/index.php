<?php
/// ======================================================================== ///
/// Test : URL Parser                                                        ///
/// ------------------------------------------------------------------------ ///
/// Open terminal                                                            ///
/// > php index.php                                                          ///
/// ======================================================================== ///

print_r("--- ========================================================== ---\n");
print_r("--- TEST : URL PARSER                                          ---\n");
print_r("--- Method : GET                                               ---\n");
print_r("--- Date : ".date('Y-m-d H:i:s')."                                 ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n");





/// 1. Requirements
/// ======================================================================== ///

require "../vendor/autoload.php";

use OSW3\UrlParser\Parser;
use OSW3\UrlParser\Components\Authority;
use OSW3\UrlParser\Components\Domain;
use OSW3\UrlParser\Components\Fragment;
use OSW3\UrlParser\Components\Host;
use OSW3\UrlParser\Components\Hostname;
use OSW3\UrlParser\Components\Password;
use OSW3\UrlParser\Components\Path;
use OSW3\UrlParser\Components\Port;
use OSW3\UrlParser\Components\Protocol;
use OSW3\UrlParser\Components\Query;
use OSW3\UrlParser\Components\Scheme;
use OSW3\UrlParser\Components\Subdomain;
use OSW3\UrlParser\Components\Tld;
use OSW3\UrlParser\Components\Username;

/// 2. HTTP Client Instance
/// ======================================================================== ///

$urlParser = new Parser;
// $url = "https://jsonplaceholder.typicode.com/posts";
$url    = require "./url.php";

$url="mongodb+srv://user:toto@cluster1.hwhoxyx.mongodb.net:234/path/to/file.txt?retryWrites=true&w=majority#retryWrites=true&w=majority";

/// 3. Parse an URL
/// ======================================================================== ///

$asArray = true;


print_r("--- ========================================================== ---\n");
print_r("--- -------------------- All data result --------------------- ---\n");
print_r("\n\n");
$result = $urlParser->parse($url, $asArray, false);
print_r($result);
print_r("\n\n");
print_r("--- ----------------- End of all data result ----------------- ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- --------------------- Scheme result ---------------------- ---\n");
print_r("\n\n");
$scheme = new Scheme($url);
print_r($scheme->info());
print_r("\n\n");
print_r("--- ------------------ End of Scheme result ------------------ ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- -------------------- Protocol result --------------------- ---\n");
print_r("\n\n");
$protocol = new Protocol($url);
print_r($protocol->info());
print_r("\n\n");
print_r("--- ----------------- End of Protocol result ----------------- ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- -------------------- Authority result -------------------- ---\n");
print_r("\n\n");
$authority = new Authority($url);
print_r($authority->info());
print_r("\n\n");
print_r("--- ----------------- End of Authority result ---------------- ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- -------------------- Username result --------------------- ---\n");
print_r("\n\n");
$username = new Username($url);
print_r($username->info());
print_r("\n\n");
print_r("--- ----------------- End of Username result ----------------- ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- -------------------- Password result --------------------- ---\n");
print_r("\n\n");
$password = new Password($url);
print_r($password->info());
print_r("\n\n");
print_r("--- ----------------- End of Password result ----------------- ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- -------------------- Hostname result --------------------- ---\n");
print_r("\n\n");
$hostname = new Hostname($url);
print_r($hostname->info());
print_r("\n\n");
print_r("--- ----------------- End of Hostname result ----------------- ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- ---------------------- Host result ----------------------- ---\n");
print_r("\n\n");
$host = new Host($url);
print_r($host->info());
print_r("\n\n");
print_r("--- ------------------- End of Host result ------------------- ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- ---------------------- Tld result ------------------------ ---\n");
print_r("\n\n");
$tld = new Tld($url);
print_r($tld->info());
print_r("\n\n");
print_r("--- ------------------- End of Tld result -------------------- ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- --------------------- Domain result ---------------------- ---\n");
print_r("\n\n");
$domain = new Domain($url);
print_r($domain->info());
print_r("\n\n");
print_r("--- ------------------ End of Domain result ------------------ ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- -------------------- Subdomain result -------------------- ---\n");
print_r("\n\n");
$subdomain = new Subdomain($url);
print_r($subdomain->info());
print_r("\n\n");
print_r("--- ----------------- End of Subdomain result ---------------- ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- ---------------------- Port result ----------------------- ---\n");
print_r("\n\n");
$port = new Port($url);
print_r($port->info());
print_r("\n\n");
print_r("--- ------------------- End of Port result ------------------- ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- ---------------------- Path result ----------------------- ---\n");
print_r("\n\n");
$path = new Path($url);
print_r($path->info());
print_r("\n\n");
print_r("--- ------------------- End of Path result ------------------- ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- --------------------- Query result ----------------------- ---\n");
print_r("\n\n");
$query = new Query($url);
print_r($query->info());
print_r("\n\n");
print_r("--- ------------------ End of Query result ------------------- ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- -------------------- Fragment result --------------------- ---\n");
print_r("\n\n");
$fragment = new Fragment($url);
print_r($fragment->info());
print_r("\n\n");
print_r("--- ----------------- End of Fragment result ----------------- ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");



print_r("--- ========================================================== ---\n");
print_r("--- ----------------- All data (lite) result ----------------- ---\n");
print_r("\n\n");
$result = $urlParser->parse($url, $asArray, true);
print_r($result);
print_r("\n\n");
print_r("--- -------------- End of all data (lite) result ------------- ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n\n\n\n\n");