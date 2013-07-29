<div class="container">
	<div class="row">
		<div class="span12">
			<?php echo $this->Html->link(__('Back'), array('prefix' => 'admin', 'controller' => 'events', 'action' => 'index'), 
				array('class' => 'btn')); ?>
			<div class="events form">
			<?php echo $this->Form->create('Event'); ?>
				<fieldset>
					<legend><?php echo __('Add Event'); ?></legend>
				<?php
					echo $this->element('event_form');
				?>
				</fieldset>
			<?php echo $this->Form->end(array('label' => __('Save Event'), 'class' => 'btn btn-primary')); ?>
			</div>
		</div>
	</div>
</div>