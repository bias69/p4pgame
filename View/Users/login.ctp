<div class="row">
	<div class="span12">
		<div class="row">
			<div class="span12">
				<?php echo $this->Session->flash('auth'); ?>
			</div>
		</div>
		<div class="row">
			<div class="span1"></div>
			<div class="span11">
				<h4>Please enter your username and password:</h4>
			</div>
		</div>
		<div class="row">&nbsp;</div>
		<?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
		<div class="control-group">
			<?php echo $this->Form->input('username', array('div' => false, 'label' => array('class' => 'control-label'), 
			'before' => '<div class="control-group">', 'between' => '<div class="controls">', 'after' => '</div></div>')) ?>
		</div>
		<div class="control-group">
			<?php echo $this->Form->input('password', array('div' => false, 'label' => array('class' => 'control-label'), 
			'before' => '<div class="control-group">', 'between' => '<div class="controls">', 'after' => '</div></div>')) ?>
		</div>
		<div class="control-group">
			<?php echo $this->Form->end(array('label' => __('Sign in'), 'class' => 'btn', 'div' => 'controls')) ?>
		</div>
	</div>
</div>
