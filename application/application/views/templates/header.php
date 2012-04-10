<?php $this->load->helper('html');
echo doctype('html5')."\r\n"; ?>
<html lang="en-us">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?> - NCLF Minecraft</title>
	<?php 
		foreach($style as $css_styles):
	    echo link_tag('CSS/'.$css_styles.'.css')."\r\n";
	    endforeach;
		echo link_tag('favicon.png','shortcut icon','image/ico')."\r\n";
	    echo link_tag('news/rss','alternate','application/rss+xml','NCLF Minecraft News Feed')."\r\n";
	    echo link_tag('favicon-apple.png','apple-touch-icon','image/png')."\r\n"; 
	?>
		<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
</head>
<body>
<!--[if lt IE 7]> <div style=' clear: both; height: 59px; padding:0 0 0 15px; position: relative;'> <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div> <![endif]-->
<header><h1 id="headerText">NCLF Minecraft</h1></header><?php echo "\r\n"; ?>