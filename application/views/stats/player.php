<div id="full-body">
	<h2><img class="playerFace" src="/dynmap/tiles/faces/32x32/<?php echo $playerData->getName(); ?>.png" alt="<?php echo $playerData->getName(); ?>'s Player Face" title="<?php echo $playerData->getName(); ?>'s Player Face" /> <?php echo $playerData->getName(); ?>'s Stats</h2>
	<?php if($playerData->isOnline()) { ?><div class="online">Online</div><?php } else { ?><div class="offline">Offline, last seen  <?php echo date(DATE_TIME, $playerData->getLastLogin()); ?></div><?php } ?>
	<p class="SubStats">Since April 8, 2012</p>
	<div id="LoginStats">First Login: <?php echo date(DATE_TIME, $playerData->getFirstLogin()); ?> | Total Time Online: <?php echo $playerPre['online']; ?></div>
	
	<div id="DistanceTravelled">
	
	</div>
</div>
