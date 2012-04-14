<?php
echo '<h2>'.$news_item['title'].'</h2>';
echo '<p>'.date("l, F j, Y g:i:sa (T)",mysql_to_unix($news_item['date'])).'</p>';
echo '<p>Posted by: '.$news_item['author'].'</p>';
echo '<p>'.$news_item['text'].'</p>';