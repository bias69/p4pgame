
<div class="row">
	<div class="span12">
		<ul class="nav nav-tabs">
		<li <?php echo $this->Html->activeStatus('all'); ?>>
			<?php echo $this->Html->link('All', array('controller' => 'events', 'action' => 'index', 'status' => 'all'))?>
		</li>
		<li <?php echo $this->Html->activeStatus('drafts'); ?>>
			<?php echo $this->Html->link('Drafts', array('controller' => 'events', 'action' => 'index', 'status' => 'drafts'))?>
		</li>
		<li <?php echo $this->Html->activeStatus('published'); ?>>
			<?php echo $this->Html->link('Published', array('controller' => 'events', 'action' => 'index', 'status' => 'published'))?>
		</li>
		<li <?php echo $this->Html->activeStatus('ended'); ?>>
			<?php echo $this->Html->link('Ended', array('controller' => 'events', 'action' => 'index', 'status' => 'ended'))?>
		</li>
		<li <?php echo $this->Html->activeStatus('closed'); ?>>
			<?php echo $this->Html->link('Closed', array('controller' => 'events', 'action' => 'index', 'status' => 'closed'))?>
		</li>
	</ul>
	</div>  
</div>