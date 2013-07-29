<div class="container">
	<div class="row">
		<div class="span12">
			<?php echo $this->Html->link(__('Back'), array('prefix' => 'admin', 'controller' => 'bets', 'action' => 'index'), 
				array('class' => 'btn')); ?>
			<div class="bets form">
			<?php echo $this->Form->create('Bet'); ?>
				<fieldset>
					<legend><?php echo __('Add Bet For');?>: <?php echo $event['Event']['fight_date'] ?> 
						<?php echo $event['Fighter'][0]['name'] ?> vs <?php echo $event['Fighter'][1]['name'] ?></legend>
				<?php
					echo $this->Form->input('bet_name');
					echo $this->Form->input('odds');
					echo $this->Form->input('type', array('options' => array('O' => 'O', '1' => '1', 'X' => 'X', '2' => '2')));
					echo $this->Form->input('event_id', array('type' => 'hidden'));
				?>
				</fieldset>
			<?php echo $this->Form->end(array('label' => __('Add Bet'), 'class' => 'btn btn-primary')); ?>
			</div>
		</div>
	</div>
</div>