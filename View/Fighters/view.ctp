<div class="fighters view">
<h2><?php echo __('Fighter'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($fighter['Fighter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($fighter['Fighter']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Record'); ?></dt>
		<dd>
			<?php echo h($fighter['Fighter']['record']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Filename'); ?></dt>
		<dd>
			<?php echo h($fighter['Fighter']['image_filename']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($fighter['Fighter']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($fighter['Fighter']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Fighter'), array('action' => 'edit', $fighter['Fighter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Fighter'), array('action' => 'delete', $fighter['Fighter']['id']), null, __('Are you sure you want to delete # %s?', $fighter['Fighter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fighters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fighter'), array('action' => 'add')); ?> </li>
	</ul>
</div>
