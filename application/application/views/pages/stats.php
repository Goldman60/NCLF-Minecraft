<div id="full-body">

<?php
//CHECK TO SEE IF THE SERVER IS RESPONDING
if($ServerConn['connection']):?>
<div id="ServerSoftware">
	<h2>Server Quick Stats</h2>
	<p><span>IP/Hostname:</span> NCLF.net:<?php echo $ServerConn['serverstats']['HostPort']; ?></p>
	<p><span>Message:</span> <?php echo $ServerConn['serverstats']['HostName']; ?></p>
	<p><span>Gametype:</span> <?php echo $ServerConn['serverstats']['GameType']; ?></p>
	<p><span>Minecraft Version:</span> <?php echo $ServerConn['serverstats']['Version']; ?></p>
	<p><span>Server Mod API:</span> <?php echo $ServerConn['serverstats']['Software']; ?></p>
	<p class="MCMA">This server proudly runs on McMyAdmin Professional</p>
</div> 

<div id="onlinePlayers">
	<h2>Online Players</h2>
	<p class="total-players">There <?php if($ServerConn['serverstats']["Players"] != 1): ?>are <?php else: ?>is <?php endif; echo $ServerConn['serverstats']["Players"]; ?> out of the maximum <?php echo $ServerConn['serverstats']["MaxPlayers"]; ?> players online<p>
	<ul class="player-list">
		<?php 
			if(!$ServerConn['PlayerList']):
		?>
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
	</ul>
</div>

<div id="serverPlugins">
	<h2>Server Plugins</h2>
	<ul class="plugin-list">
		<?php 
			natcasesort($ServerConn['serverstats']['Plugins']);
			foreach($ServerConn['serverstats']['Plugins'] as $plugin): ?>
		<li><?php echo substr($plugin,0,stripos($plugin, " ")); ?></li>
		<?php endforeach; ?>
	</ul>
</div>

<?php else: ?>
<?php //FIXME: Error needs to occur, maybe in controller redirect to error template? ?>
<?php endif; ?>

</div>