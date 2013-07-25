<div class="bets form">
<?php echo $this->Form->create('Bet'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bet'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('bet_name');
		echo $this->Form->input('odds');
		echo $this->Form->input('won');
		echo $this->Form->input('event_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Bet.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Bet.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bets'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
