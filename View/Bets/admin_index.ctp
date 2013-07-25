<div class="bets index">
	<h2><?php echo __('Bets'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('bet_name'); ?></th>
			<th><?php echo $this->Paginator->sort('odds'); ?></th>
			<th><?php echo $this->Paginator->sort('won'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bets as $bet): ?>
	<tr>
		<td><?php echo h($bet['Bet']['id']); ?>&nbsp;</td>
		<td><?php echo h($bet['Bet']['bet_name']); ?>&nbsp;</td>
		<td><?php echo h($bet['Bet']['odds']); ?>&nbsp;</td>
		<td><?php echo h($bet['Bet']['won']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bet['Event']['id'], array('controller' => 'events', 'action' => 'view', $bet['Event']['id'])); ?>
		</td>
		<td><?php echo h($bet['Bet']['created']); ?>&nbsp;</td>
		<td><?php echo h($bet['Bet']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bet['Bet']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bet['Bet']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bet['Bet']['id']), null, __('Are you sure you want to delete # %s?', $bet['Bet']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Bet'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
