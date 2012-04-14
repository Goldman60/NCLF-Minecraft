<div id="full-body">

<?php
//CHECK TO SEE IF THE SERVER IS RESPONDING
if($connection):?>
<div id="ServerSoftware">
	<h2>Server Quick Stats</h2>
	<p><span>IP/Hostname:</span> NCLF.net:<?php echo $serverstats['HostPort']; ?></p>
	<p><span>Message:</span> <?php echo $serverstats['HostName']; ?></p>
	<p><span>Gametype:</span> <?php echo $serverstats['GameType']; ?></p>
	<p><span>Minecraft Version:</span> <?php echo $serverstats['Version']; ?></p>
	<p><span>Server Mod API:</span> <?php echo $serverstats['Software']; ?></p>
	<p class="MCMA">This server proudly runs on McMyAdmin Professional</p>
</div>

<div id="onlinePlayers">
	<h2>Online Players</h2>
	<p class="total-players">There <?php if($serverstats["Players"] != 1): ?>are <?php else: ?>is <?php endif; echo $serverstats["Players"]; ?> out of the maximum <?php echo $serverstats["MaxPlayers"]; ?> players online<p>
	<ul class="player-list">
		<?php 
			if(!$PlayerList):
		?>
		<li>There are no players online</li>
		<?php 
			else: 
			natcasesort($PlayerList);
			foreach ($PlayerList as $username): 
		?>
		
		<li><img class="playerFace" src="/dynmap/tiles/faces/16x16/<?php echo $username; ?>.png" alt="<?php echo $username; ?>'s Player Face" /> <?php echo $username; ?></li>
		<?php 
			endforeach;
			endif; 
		?>
	</ul>
</div>

<div id="serverPlugins">
	<h2>Server Plugins</h2>
	<ul class="plugin-list">
		<?php 
			natcasesort($serverstats['Plugins']);
			foreach($serverstats['Plugins'] as $plugin): ?>
		<li><?php echo substr($plugin,0,stripos($plugin, " ")); ?></li>
		<?php endforeach; ?>
	</ul>
</div>

<?php else: ?>
<?php //FIXME: Error needs to occur, maybe in controller redirect to error template? ?>
<?php endif; ?>

</div>