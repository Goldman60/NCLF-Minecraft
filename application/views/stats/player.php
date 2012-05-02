<div id="full-body">
	<h2><img class="playerFace" src="/dynmap/tiles/faces/32x32/<?php echo $playerData->getName(); ?>.png" alt="<?php echo $playerData->getName(); ?>'s Player Face" title="<?php echo $playerData->getName(); ?>'s Player Face" /> <?php echo $playerData->getName(); ?>'s Stats</h2>
	<p class="SubStats">Since April 8, 2012 on the main NCLF Server</p>
	<?php if($playerData->isOnline()) { ?><div class="online">Online</div><?php } else { ?><div class="offline">Offline, last seen  <?php echo date(DATE_TIME, $playerData->getLastLogin()); ?></div><?php } ?>
	<div id="LoginStats">First Login: <?php echo date(DATE_TIME, $playerData->getFirstLogin()); ?> | Total Time Online: <?php echo $playerPre['online']; ?></div>
	
	<div id="DistanceTravelled">
		<table>
			<thead>
				<tr>
					<th colspan="2">Distance Travelled</th>
				</tr>
				<tr>
					<th>Mode</th>
					<th>Distance (Meters)</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Foot</td>
					<td><?php echo number_format($playerData->getDistanceTraveledByFoot()); ?></td>
				</tr>
				<tr>
					<td>Minecart</td>
					<td><?php echo number_format($playerData->getDistanceTraveledByMinecart()); ?></td>
				</tr> 
				<tr>
					<td>Pig</td>
					<td><?php echo number_format($playerData->getDistanceTraveledByPig()); ?></td>
				</tr>
				<tr>
					<td>Boat</td>
					<td><?php echo number_format($playerData->getDistanceTraveledByBoat()); ?></td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td class="total">Total</td>
					<td><?php echo number_format($playerData->getDistanceTraveledTotal()); ?></td>
				</tr>
			</tfoot>
		</table>
	</div> 
</div>
