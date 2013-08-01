<div class="container">
	<div class="row">
		<div class="span12">
			<?php echo $this->Html->link(__('Back'), array('prefix' => 'admin', 'controller' => 'fighters', 'action' => 'index'), 
				array('class' => 'btn')); ?>
			<div class="fighters form">
			<?php echo $this->Form->create('Fighter', array('type' => 'file')); ?>
				<fieldset>
					<legend><?php echo __('Add Fighter')?></legend>
				<?php
					echo $this->Form->input('name');
					echo $this->Form->input('record');
					echo $this->Form->file('Fighter.photo');
					echo $this->Form->hidden('Fighter.photo_dir');
				?>
				</fieldset>
				<div class="row">&nbsp;</div>
			<?php echo $this->Form->end(array('label' => __('Save Fighter'), 'class' => 'btn btn-primary')); ?>
			</div>
		</div>
	</div>
</div>
