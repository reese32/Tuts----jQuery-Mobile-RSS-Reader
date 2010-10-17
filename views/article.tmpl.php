<?php include('includes/header.php'); ?>
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


