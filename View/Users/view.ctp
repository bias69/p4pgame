<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Credits'); ?></dt>
		<dd>
			<?php echo h($user['User']['credits']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($user['User']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Codes'), array('controller' => 'codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code'), array('controller' => 'codes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bets'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bet'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Codes'); ?></h3>
	<?php if (!empty($user['Code'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Code'] as $code): ?>
		<tr>
			<td><?php echo $code['id']; ?></td>
			<td><?php echo $code['user_id']; ?></td>
			<td><?php echo $code['created']; ?></td>
			<td><?php echo $code['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'codes', 'action' => 'view', $code['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'codes', 'action' => 'edit', $code['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'codes', 'action' => 'delete', $code['id']), null, __('Are you sure you want to delete # %s?', $code['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Code'), array('controller' => 'codes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Bets'); ?></h3>
	<?php if (!empty($user['Bet'])): ?>
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
		foreach ($user['Bet'] as $bet): ?>
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
