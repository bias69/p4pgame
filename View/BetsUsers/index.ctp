<div class="betsUsers index">
	<h2><?php echo __('Bets Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('bet_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ammount'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($betsUsers as $betsUser): ?>
	<tr>
		<td><?php echo h($betsUser['BetsUser']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($betsUser['Bet']['id'], array('controller' => 'bets', 'action' => 'view', $betsUser['Bet']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($betsUser['User']['id'], array('controller' => 'users', 'action' => 'view', $betsUser['User']['id'])); ?>
		</td>
		<td><?php echo h($betsUser['BetsUser']['ammount']); ?>&nbsp;</td>
		<td><?php echo h($betsUser['BetsUser']['created']); ?>&nbsp;</td>
		<td><?php echo h($betsUser['BetsUser']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $betsUser['BetsUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $betsUser['BetsUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $betsUser['BetsUser']['id']), null, __('Are you sure you want to delete # %s?', $betsUser['BetsUser']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Bets User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bets'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bet'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
