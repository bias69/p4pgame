<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Add Event'); ?></legend>
	<?php
		echo $this->Form->input('fight_date');
		echo $this->Form->input('bets_close_time');
		echo $this->Form->input('result');
		echo $this->Form->input('Fighter');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Bets'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bet'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fighters'), array('controller' => 'fighters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fighter'), array('controller' => 'fighters', 'action' => 'add')); ?> </li>
	</ul>
</div>
