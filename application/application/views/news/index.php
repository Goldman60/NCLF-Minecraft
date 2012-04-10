<?php 
//Patches news order
$news = array_reverse($news);
//FIXME: News queries in wrong order? Returns oldest to newest rather than newest to a certain number of oldest
foreach($news as $news_item): ?>

<h2><?php echo $news_item['title']; ?></h2>

<div id="main">
	<?php echo $news_item['text']; ?>
</div>

<p><a href="news/<?php echo $news_item['slug']; ?>.html">View Article</a></p>

<?php endforeach ?>