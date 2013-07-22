<div class="betsUsers view">
<h2><?php echo __('Bets User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($betsUser['BetsUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bet'); ?></dt>
		<dd>
			<?php echo $this->Html->link($betsUser['Bet']['id'], array('controller' => 'bets', 'action' => 'view', $betsUser['Bet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($betsUser['User']['id'], array('controller' => 'users', 'action' => 'view', $betsUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ammount'); ?></dt>
		<dd>
			<?php echo h($betsUser['BetsUser']['ammount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($betsUser['BetsUser']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($betsUser['BetsUser']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bets User'), array('action' => 'edit', $betsUser['BetsUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bets User'), array('action' => 'delete', $betsUser['BetsUser']['id']), null, __('Are you sure you want to delete # %s?', $betsUser['BetsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bets Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bets User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bets'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bet'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
