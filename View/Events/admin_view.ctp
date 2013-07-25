<div class="events view">
<h2><?php echo __('Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fight Date'); ?></dt>
		<dd>
			<?php echo h($event['Event']['fight_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bets Close Time'); ?></dt>
		<dd>
			<?php echo h($event['Event']['bets_close_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Result'); ?></dt>
		<dd>
			<?php echo h($event['Event']['result']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($event['Event']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($event['Event']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event'), array('action' => 'edit', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Event'), array('action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bets'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bet'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fighters'), array('controller' => 'fighters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fighter'), array('controller' => 'fighters', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Bets'); ?></h3>
	<?php if (!empty($event['Bet'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Bet Name'); ?></th>
		<th><?php echo __('Odds'); ?></th>
		<th><?php echo __('Won'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($event['Bet'] as $bet): ?>
		<tr>
			<td><?php echo $bet['id']; ?></td>
			<td><?php echo $bet['bet_name']; ?></td>
			<td><?php echo $bet['odds']; ?></td>
			<td><?php echo $bet['won']; ?></td>
			<td><?php echo $bet['event_id']; ?></td>
			<td><?php echo $bet['created']; ?></td>
			<td><?php echo $bet['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bets', 'action' => 'view', $bet['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bets', 'action' => 'edit', $bet['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bets', 'action' => 'delete', $bet['id']), null, __('Are you sure you want to delete # %s?', $bet['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bet'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Fighters'); ?></h3>
	<?php if (!empty($event['Fighter'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Record'); ?></th>
		<th><?php echo __('Photo'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($event['Fighter'] as $fighter): ?>
		<tr>
			<td><?php echo $fighter['id']; ?></td>
			<td><?php echo $fighter['name']; ?></td>
			<td><?php echo $fighter['record']; ?></td>
			<td><?php echo $fighter['photo']; ?></td>
			<td><?php echo $fighter['created']; ?></td>
			<td><?php echo $fighter['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'fighters', 'action' => 'view', $fighter['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'fighters', 'action' => 'edit', $fighter['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'fighters', 'action' => 'delete', $fighter['id']), null, __('Are you sure you want to delete # %s?', $fighter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Fighter'), array('controller' => 'fighters', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
