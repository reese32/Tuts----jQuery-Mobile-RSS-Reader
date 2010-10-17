<?php

$siteName = $_GET['siteName'];
$origLink = $_GET['origLink'];

$path = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20feed%20where%20url%3D'http%3A%2F%2Ffeeds.feedburner.com%2F$siteName'%20AND%20guid%3D%22$origLink%22&format=json";
$feed = json_decode(file_get_contents($path));
$feed = $feed->query->results->item;

include('views/article.tmpl.php'); 
