<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>P4PGame - The boxing bet game</title>
	<meta name="robots" content="index, nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="/css/site.css" rel="stylesheet" media="screen">
</head>
<body>
	<div id="wrap">
		<div class="container">
			<div class="row">
				<div class="span8">
				<h1><span class="red">P4P</span><span class="blue">Game</span></h1>
				</div>
				<div class="span4">
					<p></p>
					<p></p>
					<p></p>
					<p></p>
					<p class="text-right">
						<?php 
							if ($loggedIn) echo 'Credits: '.$this->Session->read('Auth.User.credits').', ';
							if ($loggedIn) echo $this->Session->read('Auth.User.username').', ';
							echo $loggedIn ? $this->Html->link('logout', array('controller' => 'users', 'action' => 'logout')) : 
								$this->Html->link('login', array('controller' => 'users', 'action' => 'login'));
						?>
					</p>
				</div>
			</div>
			<?php echo $this->element('user_navbar'); ?>

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="push"></div>
	</div>
	<?php echo $this->element('footer') ?>
	<?php 
		echo $this->Html->script(array('http://code.jquery.com/jquery.js', 'bootstrap.min', 'site'));
	?>
</body>
	<?php echo $this->element('bet_modal') ?>
	<div id="place-bet-alert" class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
	</div>
</html>
