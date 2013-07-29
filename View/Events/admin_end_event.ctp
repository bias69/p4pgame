<div class="container">
	<div class="row">
		<div class="span12">
			<?php echo $this->Html->link(__('Back'), array('prefix' => 'admin', 'controller' => 'events', 'action' => 'index'), 
				array('class' => 'btn')); ?>
			<div class="events form">
			<p></p>
			<?php echo $this->Form->create('Event'); ?>
				<fieldset>
					<legend><?php echo __('End Event'); ?>: <?php echo $this->data['Fighter']['0']['name'] ?> vs <?php echo $this->data['Fighter']['1']['name'] ?> 
						<?php echo $this->data['Event']['fight_date'] ?></legend>
				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('result');
				?>
				</fieldset>
			<?php echo $this->Form->end(array('label' => __('End Event'), 'class' => 'btn btn-primary')); ?>
			</div>
		</div>
	</div>
</div>