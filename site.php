<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

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

?>
<!DOCTYPE html> 
<html> 
   <head> 
   <meta charset="utf-8">
   <title><?php echo ucwords($siteName); ?></title> 
   <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.css" />
   <script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
   <script src="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.js"></script>
</head> 
<body> 

<div data-role="page">

<div data-role="header" id="header" class="<?php echo $siteName; ?>">
      <h1><?php echo ucwords($siteName).'+'; ?></h1>
   </div><!-- /header -->

   <div data-role="content">	
   <ul data-role="listview" data-theme="c" data-dividertheme="d" data-counttheme="e">
   <?php
         foreach($feed->query->results->item as $item) {
            if ( $siteName === 'psdtuts' ) $comments = $item->comments->content;
            else $comments = $item->comments[1];
         ?>

         <li>
           <h2>
              <a href="article.php?siteName=<?php echo $siteName;?>&origLink=<?php echo $item->guid->content;?>">
                    <?php echo $item->title; ?>
              </a>
           </h2>
           <span class="ui-li-count"><?php echo $comments; ?> </span>
        </li>

   <?php  } ?>
</ul>
   </div><!-- /content -->

   <div data-role="footer" class="<?php echo $siteName; ?>">
      <h4> www.tutsplus.com</h4>
   </div><!-- /header -->
</div><!-- /page -->

</body>
</html>


