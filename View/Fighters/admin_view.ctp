<div class="row">
	<div class="span12">
	<?php echo $this->Html->link(__('Back'), array('prefix' => 'admin', 'controller' => 'fighters', 'action' => 'index'), 
		array('class' => 'btn')); ?>
	</div>
</div>
<div class="row">
	<div class="span4">
		<h3><?php echo $fighter['Fighter']['name'] ?></h3>
		<h4><?php echo $fighter['Fighter']['record'] ?></h3>
	</div>
	<div class="span8 text-right">
		<img src="/files/fighter/photo/<?php echo $fighter['Fighter']['photo_dir'] ?>/<?php echo $fighter['Fighter']['photo'] ?>" class="img-polaroid">
	</div>
</div>