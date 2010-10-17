<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$siteName = $_GET['siteName'];
$origLink = $_GET['origLink'];

$path = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20feed%20where%20url%3D'http%3A%2F%2Ffeeds.feedburner.com%2F$siteName'%20AND%20guid%3D%22$origLink%22&format=json";
$feed = json_decode(file_get_contents($path));
$feed = $feed->query->results->item;
?>
<!DOCTYPE html> 
<html> 
   <head> 
   <meta charset="utf-8">
   <title><?php echo ucWords($siteName); ?></title> 
   <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.css" />
   <link rel="stylesheet" href="mobile.css" />	
   <link rel="stylesheet" href="article.css" />
   <script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
   <script src="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.js"></script>
</head> 
<body> 

<div data-role="page">

   <div data-role="header" class="<?php echo $siteName; ?>">
      <h1> <?php echo ucWords($siteName).'+'; ?> </h1>
   </div><!-- /header -->

   <div data-role="content">	
        <h1> <?php echo $feed->title; ?> </h1>
        <div> <?php echo $feed->description; ?> </div>
   </div><!-- /content -->

   <div data-role="footer" class="<?php echo $siteName; ?>" data-position="fixed">
   <h4> <a href="<?php echo $feed->guid->content;?>" data-icon="forward"> Read on <?php echo ucWords($siteName); ?>+</a></h4>
   </div><!-- /header -->
</div><!-- /page -->

<script class="javascript" src="http://net.tutsplus.com/wp-content/plugins/google-syntax-highlighter/Scripts/shCore.js"></script>
<script class="javascript" src="http://net.tutsplus.com/wp-content/plugins/google-syntax-highlighter/Scripts/shBrushAll.js"></script>
<script class="javascript">
dp.SyntaxHighlighter.ClipboardSwf = 'http://net.tutsplus.com/wp-content/plugins/google-syntax-highlighter/Scripts/clipboard.swf';
dp.SyntaxHighlighter.HighlightAll('code');
</script>

<script type="text/javascript">
$('img, embed, object').removeAttr('height').removeAttr('width');
</script>

</body>
</html>


