<?php foreach ($events as $event): ?>
	<div class="row">
		<div class="span12">
			<div class="row">
				<div class="span10">
					<h4><?php echo $event['Event']['fight_date'] ?>: <?php echo $event['Fighter'][0]['name'] ?> vs <?php echo $event['Fighter'][1]['name'] ?></h4>
				</div>
				<div class="span2 text-right">
					<a href="/admin/bets/add/<?php echo $event['Event']['id'] ?>" class="btn btn-primary">New Bet</a>
				</div>
			</div>
			
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Bet</th>
						<th>Odds</th>
						<th>Type</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
						<?php foreach ($event['Bet'] as $bet): ?>
						<tr>
							<td><?php echo $bet['bet_name'] ?></td>
							<td><?php echo number_format($bet['odds'], 2) ?></td>
							<td><?php echo $bet['type'] ?></td>
							<td>
								<?php echo $this->Html->link(__('Edit'), 
									array('controller' => 'bets', 'action' => 'edit', $bet['id']),
									array('class' => 'btn btn-warning'))
								?>
								<?php echo $this->Form->postLink(__('Delete'), 
									array('controller' => 'bets', 'action' => 'delete', $bet['id']), 
									array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $bet['id']))
								?>
							</td>
						</tr>
						<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
<?php endforeach; ?>
<div class="row">&nbsp;</div>

	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pagination">
		<ul>
	<?php
		echo $this->Paginator->prev(__('Prev'), array('escape' => false, 'tag' => 'li', 'disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '', 'currentClass' => 'active', 'currentTag' => 'a'));
		echo $this->Paginator->next(__('Next'), array('escape' => false, 'tag' => 'li', 'disabledTag' => 'a'));
	?>
		</ul>
	</div>
