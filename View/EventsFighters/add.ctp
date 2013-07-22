<div class="eventsFighters form">
<?php echo $this->Form->create('EventsFighter'); ?>
	<fieldset>
		<legend><?php echo __('Add Events Fighter'); ?></legend>
	<?php
		echo $this->Form->input('event_id');
		echo $this->Form->input('fighter_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Events Fighters'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fighters'), array('controller' => 'fighters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fighter'), array('controller' => 'fighters', 'action' => 'add')); ?> </li>
	</ul>
</div>
