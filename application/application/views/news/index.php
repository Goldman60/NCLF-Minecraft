<div id="left-body">
<?php 
foreach($news as $news_item): ?>

<div class="post" id="<?php echo $news_item['slug']; ?>">
	<h2><?php echo $news_item['title']; ?></h2>
	<p class="date"><?php echo date("l, F j, Y g:i:sa (T)",mysql_to_unix($news_item['date'])); ?></p>
	<p class="author">Posted by: <?php echo $news_item['author']; ?></p>
	
	<div class="main">
		<?php echo $news_item['text']; ?>
	</div>

	<p><a href="news/<?php echo $news_item['slug']; ?>.html">View Article</a></p>
</div>
<?php endforeach ?>
</div>