<?php
/// ======================================================================== ///
/// Test : URL Parser                                                        ///
/// ------------------------------------------------------------------------ ///
/// Open terminal                                                            ///
/// > php index.php                                                          ///
/// ======================================================================== ///

print_r("--- ========================================================== ---\n");
print_r("--- TEST : URL PARSER                                          ---\n");
print_r("--- ========================================================== ---\n");
print_r("\n\n");



/// 1. Requirements
/// ======================================================================== ///

require "../vendor/autoload.php";

use OSW3\UrlParser\Parser;
use OSW3\UrlParser\Components\Authority;

/// 2. HTTP Client Instance
/// ======================================================================== ///

$urlParser = new Parser;
// $url = "https://jsonplaceholder.typicode.com/posts";
$url    = require "./url.php";


/// 3. Parse an URL
/// ======================================================================== ///

$asArray = true;

$result = $urlParser->parse($url, $asArray);


print_r("-- RESULT --");
print_r("\n\n");
print_r($result);
print_r("\n\n");

$authority = new Authority($url);
print_r("-- RESULT --");
print_r("\n\n");
print_r($authority->info() );
print_r("\n\n");
