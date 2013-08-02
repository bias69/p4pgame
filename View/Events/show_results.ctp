<div class="row">
	<div class="span12">
		<table class="table table-hover">
			<thead>
				<th>Fight date</th>
				<th>Fighters</th>
				<th>Result</th>
			</thead>
			<tbody>
				<?php foreach ($events as $event): ?>
					<tr>
						<td><?php echo $event['Event']['fight_date'] ?></td>
						<td><?php echo $event['Fighter'][0]['name'] ?> vs <?php echo $event['Fighter'][1]['name'] ?></td>
						<td><?php echo $event['Event']['result'] ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>