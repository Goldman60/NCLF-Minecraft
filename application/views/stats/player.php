<div id="full-body">
	<h2><img class="playerFace" src="/dynmap/tiles/faces/32x32/<?php echo $playerData->getName(); ?>.png" alt="<?php echo $playerData->getName(); ?>'s Player Face" title="<?php echo $playerData->getName(); ?>'s Player Face" /> <?php echo $playerData->getName(); ?>'s Stats</h2>
	<p class="SubStats">Since April 8, 2012 on the main NCLF Server</p>
	<?php if($playerData->isOnline()) { ?><div class="online">Online, since <?php echo date(DATE_TIME,$playerData->getCurrentLoginTime()); ?></div><?php } else { ?><div class="offline">Offline, last seen  <?php echo date(DATE_TIME, $playerData->getLastLogin()); ?></div><?php } ?>
	<div id="LoginStats">
		<ul>
			<li>First Login: <?php echo date(DATE_TIME, $playerData->getFirstLogin()); ?></li>
			<li>Total Time Online: <?php echo $playerPre['online']; ?></li>
			<li>Total Logins: <?php echo $playerData->getNumberOfLogins(); ?></li>
		</ul>
	</div>
	
	<div id="DistanceTravelled">
	<h3>Distance Travelled</h3>
		<table>
			<thead>
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
	
	<?php 
		$placed = $playerData->getBlocksMostPlaced(); 
		$destroy = $playerData->getBlocksMostDestroyed(); 
		$blockTable = $playerData->getPlayerBlockTable();
		
		//Remove air from the block table
		
	?>
	
	<div id="Blocks">
		<h3>Block Quick Stats</h3>
		<ul>
			<li>Total Blocks Destroyed: <?php echo $playerData->getBlocksDestroyedTotal(); ?></li>
			<li>Most Destroyed Block: <?php echo Stats_utilities::getResourceNameById($destroy['block_id']); ?> (<?php echo $destroy['sum']; ?>)</li>
			<li>Total Blocks Placed: <?php echo $playerData->getBlocksPlacedTotal(); ?></li>
			<li>Most Placed Block: <?php echo Stats_utilities::getResourceNameById($placed['block_id']); ?> (<?php echo $placed['sum']; ?>)</li>
		</ul>
	</div>
	<div id="DetailedBlock">
		<h3>Detailed Block Breakdown</h3> 
		<table>
			<thead>
				<tr>
					<th>Block Type</th>
					<th>Placed</th>
					<th>Destroyed</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($blockTable as $block): ?>
				<tr>
					<td><?php echo Stats_utilities::getResourceNameById($block["block_id"]); ?></td>
					<td><?php echo $block["num_placed"]; ?></td>
					<td><?php echo $block["num_destroyed"]; ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
