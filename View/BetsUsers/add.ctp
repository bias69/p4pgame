<div class="betsUsers form">
<?php echo $this->Form->create('BetsUser'); ?>
	<fieldset>
		<legend><?php echo __('Add Bets User'); ?></legend>
	<?php
		echo $this->Form->input('bet_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('ammount');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bets Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Bets'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bet'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
