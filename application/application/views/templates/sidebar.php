<div id="right-side">
	<div class="player-list">
		<h2>Players Online</h2>
		<p class="small-players"><?php echo $serverstats['Players']; ?>/<?php echo $serverstats["MaxPlayers"]; ?></p>
		<ul>
			<?php if(!$PlayerList): ?>
			<li>There are no players online</li>
			<?php 
			else: 
			natcasesort($PlayerList);
			foreach ($PlayerList as $username): 
			?>
			<li><?php echo $username; ?></li>
			<?php 
			endforeach;
			endif; 
			?>
			<?php //FIXME: Error needs to occur, maybe in controller redirect to error template? ?>
		</ul>
	</div>
</div>