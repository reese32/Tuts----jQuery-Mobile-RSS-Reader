<?php

$siteName = empty($_GET['siteName']) ? 'nettuts' : $_GET['siteName'];

$cache = dirname(__FILE__) . "/cache/$siteName";
if(filemtime($cache) < (time() - 10800))
{
   // Get from server
   if ( !file_exists(dirname(__FILE__) . '/cache') ) {
      mkdir(dirname(__FILE__) . '/cache', 0777);
   }

   $path = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20feed%20where%20url%3D'http%3A%2F%2Ffeeds.feedburner.com%2F$siteName'&format=json";

   $feed = file_get_contents($path, true);

   $cachefile = fopen($cache, 'wb');
   fwrite($cachefile, $feed);
   fclose($cachefile);
}
else
{
   // Use cached file
   $feed = file_get_contents($cache);
}

$feed = json_decode($feed);

include('views/site.tmpl.php');

