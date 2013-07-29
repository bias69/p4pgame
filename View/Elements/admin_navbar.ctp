<!-- Navbar -->
<div class="row">
	<div class="span12">
		<div class="navbar">
			<div class="navbar-inner">
				<ul class="nav">
					<li <?php echo $this->Html->activeController('events'); ?>>
						<?php echo $this->Html->link('Events', array('controller' => 'events', 'action' => 'index')); ?>
					</li>
					<li <?php echo $this->Html->activeController('bets'); ?>>
						<?php echo $this->Html->link('Bets', array('controller' => 'bets', 'action' => 'index')); ?>
					</li>
					<li <?php echo $this->Html->activeController('fighters'); ?>>
						<?php echo $this->Html->link('Fighters', array('controller' => 'fighters', 'action' => 'index')); ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>