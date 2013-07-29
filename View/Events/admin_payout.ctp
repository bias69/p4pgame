<div class="container">
	<div class="row">
		<div class="span12">
			<?php echo $this->Html->link(__('Back'), array('prefix' => 'admin', 'controller' => 'events', 'action' => 'index'), 
				array('class' => 'btn')); ?>
			<div class="events form">
			<p></p>
			<?php echo $this->Form->create('Event'); ?>
				<fieldset>
					<legend><?php echo __('Payout Event'); ?>: <?php echo $this->data['Fighter']['0']['name'] ?> vs <?php echo $this->data['Fighter']['1']['name'] ?> 
						<?php echo $this->data['Event']['fight_date'] ?></legend>
				<?php
					echo $this->Form->input('id');
				?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Bet</th>
		  					<th>Odds</th>
		  					<th>Won</th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach ($this->data['Bet'] as $key => $bet):
					?>
						<tr>
							<td><?php echo $bet['bet_name']; ?></td>
							<td><?php echo $bet['odds']; ?></td>
							<td>
								<?php echo $this->Form->input('Bet.'.$key.'.id') ?>
								<?php echo $this->Form->input('Bet.'.$key.'.won') ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				</fieldset>
			<?php echo $this->Form->end(array('label' => __('Payout'), 'class' => 'btn btn-primary')); ?>
			</div>
		</div>
	</div>
</div>