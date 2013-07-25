<div class="fighters form">
<?php echo $this->Form->create('Fighter', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Fighter'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Fighters'), array('action' => 'index')); ?></li>
	</ul>
</div>
