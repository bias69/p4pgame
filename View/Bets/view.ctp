<div class="bets view">
<h2><?php echo __('Bet'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bet Name'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['bet_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Odds'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['odds']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Won'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['won']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bet['Event']['id'], array('controller' => 'events', 'action' => 'view', $bet['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bet'), array('action' => 'edit', $bet['Bet']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bet'), array('action' => 'delete', $bet['Bet']['id']), null, __('Are you sure you want to delete # %s?', $bet['Bet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bet'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($bet['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Credits'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($bet['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['credits']; ?></td>
			<td><?php echo $user['active']; ?></td>
			<td><?php echo $user['role']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
