<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/site.css" rel="stylesheet" media="screen">
</head>
<body>
	<div class="container">
		<div class="row">
	        <div class="span8">
	        	<h1>P4PGame Admin</h1>
	        </div>
	        <div class="span4">
	        	<p></p>
	        	<p></p>
	        	<p></p>
	        	<p></p>
	         	<p class="text-right"><?php echo $this->Html->link('logout', '/users/logout') ?></p>
	        </div>
      	</div>
      	<?php echo $this->element('admin_navbar'); ?>

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
	</div>
	<?php 
		echo $this->Html->script(array('http://code.jquery.com/jquery.js', 'bootstrap.min'));
	?>
</body>
</html>
