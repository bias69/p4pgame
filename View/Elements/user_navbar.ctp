<!-- Navbar -->
<div class="row">
	<div class="span12">
		<div class="navbar">
			<div class="navbar-inner">
				<ul class="nav">
					<li <?php echo $this->Html->activeController('events', 'index'); ?>>
						<?php echo $this->Html->link('Home', array('controller' => 'events', 'action' => 'index')); ?>
					</li>
					<li <?php echo $this->Html->activeController('betsusers'); ?>>
						<?php echo $this->Html->link('My bets', array('controller' => 'betsusers', 'action' => 'index')); ?>
					</li>
					<li <?php echo $this->Html->activeController('events', 'show_results'); ?>>
						<?php echo $this->Html->link('Results', array('controller' => 'events', 'action' => 'show_results')); ?>
					</li>
					<li <?php echo $this->Html->activeController('users', 'show_rank'); ?>>
						<?php echo $this->Html->link('P4P rank', array('controller' => 'users', 'action' => 'show_rank')); ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>