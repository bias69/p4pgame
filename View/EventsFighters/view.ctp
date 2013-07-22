<div class="eventsFighters view">
<h2><?php echo __('Events Fighter'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventsFighter['EventsFighter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsFighter['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventsFighter['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fighter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsFighter['Fighter']['name'], array('controller' => 'fighters', 'action' => 'view', $eventsFighter['Fighter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($eventsFighter['EventsFighter']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($eventsFighter['EventsFighter']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Events Fighter'), array('action' => 'edit', $eventsFighter['EventsFighter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Events Fighter'), array('action' => 'delete', $eventsFighter['EventsFighter']['id']), null, __('Are you sure you want to delete # %s?', $eventsFighter['EventsFighter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Fighters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Fighter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fighters'), array('controller' => 'fighters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fighter'), array('controller' => 'fighters', 'action' => 'add')); ?> </li>
	</ul>
</div>
