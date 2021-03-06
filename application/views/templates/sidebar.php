<div id="right-side">
	<?php if($ServerConn['connection']): //The server communicated properly?>
	<div id="player-list">
		<h2>Players Online</h2>
		<p class="small-players"><?php echo $ServerConn['serverstats']['Players']; ?>/<?php echo $ServerConn['serverstats']["MaxPlayers"]; ?></p>
		<ul>
			<?php if(!$ServerConn['PlayerList']): ?>
			<li>There are no players online</li>
			<?php 
			else: 
			natcasesort($ServerConn['PlayerList']);
			foreach ($ServerConn['PlayerList'] as $username): 
			?>
			<li><img class="playerFace" src="/dynmap/tiles/faces/16x16/<?php echo $username; ?>.png" alt="<?php echo $username; ?>'s Player Face" /> <?php echo $username; ?></li>
			<?php 
			endforeach;
			endif; 
			?>
			<?php //FIXME: Error needs to occur, maybe in controller redirect to error template? ?>
		</ul>
	</div>
	<?php else: //If no connection display this ?>
	
	<div id="sidebar-com-error">
		<h2>Communication Error</h2>
		<p class="message">We had trouble communicating with the Minecraft Server. You may need to refresh your browser or the server may be down.</p>
		<p class="more-error-info">Error: <?php echo $ServerConn['ErrorCode']; ?> <?php echo $ServerConn['Error']; ?></p>	
	</div>
	
	<?php endif; ?>
	
	<div id="Donate">
		<h2>Donate</h2>
		<p>NCLF Minecraft needs money to operate, support us with some cash!</p>		
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
			<input style="border:0;" type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" style="border:0;" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
	</div>
</div>