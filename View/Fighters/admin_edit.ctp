<div class="fighters form">
<?php echo $this->Form->create('Fighter'); ?>
	<fieldset>
		<legend><?php echo __('Edit Fighter'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('record');
		echo $this->Form->file('Fighter.photo');
		echo $this->Form->hidden('Fighter.photo_dir');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Fighter.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Fighter.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Fighters'), array('action' => 'index')); ?></li>
	</ul>
</div>
