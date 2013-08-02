<?php foreach ($events as $event): ?>
	<div class="row">
		<div class="span12">
			<div class="row">
				<div class="span12">
					<h4><?php echo $event['Event']['fight_date'] ?>: <?php echo $event['Fighter'][0]['name'] ?> vs <?php echo $event['Fighter'][1]['name'] ?></h4>
				</div>
			</div>
			
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Bet</th>
						<th>Odds</th>
						<th>My ammount</th>
						<th>Win ammount</th>
						<th>Won</th>
					</tr>
				</thead>

				<tbody>

					<?php foreach ($betsUsers as $betsUser): ?>
						<?php if ($betsUser['Bet']['event_id'] == $event['Event']['id']): ?>
							<tr>
								<td><?php echo $betsUser['Bet']['bet_name'] ?></td>
								<td><?php echo number_format($betsUser['Bet']['odds'], 2) ?></td>
								<td><?php echo $betsUser['BetsUser']['ammount'] ?></td>
								<td><?php echo (int) (number_format($betsUser['Bet']['odds'], 2)*$betsUser['BetsUser']['ammount']) ?></td>
								<td><?php echo $this->Html->resultIcon($betsUser['Bet']['won']) ?></td>
							</tr>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
<?php endforeach; ?>
<div class="row">&nbsp;</div>
