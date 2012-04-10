<?php echo '<?xml version="1.0" encoding="'.$encoding.'"?>'."\n"; ?>  
<rss version="2.0">

<channel>
	<title><?php echo $feed_name; ?></title>
	<link> <?php echo $feed_url; ?></link>
	<description><?php echo $page_description; ?></description>
	<copyright>Copyright NCLF.net and A.J. Fite <?php echo gmdate("Y",time()); ?></copyright>
	<pubDate></pubDate>
	<category><?php echo $feed_category; ?></category>
	<language><?php echo $page_language; ?></language>
	<ttl><?php echo $page_ttl; ?></ttl>
	<docs>http://www.rssboard.org/rss-specification</docs>
	
<?php foreach($posts as $rss_item): ?>
<?php //FIXME RSS feed needs time generated ?>
	<item>
		<title><?php echo $rss_item['title']?></title>
		<link>http://nclfminecraft.org/news/<?php echo $rss_item['slug']; ?>.html</link>
		<description><?php echo $rss_item['text']?></description>
		<guid><?php echo $rss_item['id']; ?></guid>
	</item>
<?php endforeach; ?>
</channel>
</rss>  