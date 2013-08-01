<div class="row">
	<div class="span12">
		<h2 class="text-center">Promoted fight</h2>
	</div>
</div>

<?php if(!empty($promoted_event)): ?>
	<!-- Images&Desc -->
	<div class="row text-center">
		<div class="span4">
			<image class="img-polaroid" src="/files/fighter/photo/
			<?php echo $promoted_event['Fighter'][0]['photo_dir'] ?>
			/promo_
			<?php echo $promoted_event['Fighter'][0]['photo'] ?>" />
		</div>
		<div class="span4">
			<h4>Category: <?php echo $promoted_event['Event']['description'][0] ?></h4>
			<h4>Rounds: <?php echo $promoted_event['Event']['description'][1] ?></h4>
			<h4>Belts:</h4>
			<h4><?php echo $promoted_event['Event']['description'][2] ?></h4>
		</div>
		<div class="span4">
			<image class="img-polaroid" src="/files/fighter/photo/
			<?php echo $promoted_event['Fighter'][1]['photo_dir'] ?>
			/promo_
			<?php echo $promoted_event['Fighter'][1]['photo'] ?>" />
		</div>
	</div>

	<div class="row text-center">
		<div class="span4">
			<h4><?php echo $promoted_event['Fighter'][0]['name'] ?></h4>
		</div>
		<div class="span4">
			<h4><?php echo $promoted_event['Event']['fight_date'] ?></h4>
		</div>
		<div class="span4">
			<h4><?php echo $promoted_event['Fighter'][1]['name'] ?></h4>
		</div>
	</div>

	<div class="row text-center">
		<div class="span4">
			<h5><?php echo $promoted_event['Fighter'][0]['record'] ?></h5>
		</div>
		<div class="span4">
			<h5>betting ends: <?php echo $promoted_event['Event']['bets_close_time'] ?> CET</h5>
		</div>
		<div class="span4">
			<h5><?php echo $promoted_event['Fighter'][1]['record'] ?></h5>
		</div>
	</div>

	<div class="row text-center">
		<div class="span4"></div>
		<div class="span4">
			<h4>1 x 2</h4>
		</div>
		<div class="span4"></div>
	</div>

	<!-- Main bets -->
	<div class="row text-center">
		<div class="span4">
			<?php $bet_details = $this->Html->betButton('1', $promoted_event['Bet']); ?>
			<a href="#" role="button" class="btn bet-btn" data-toggle="modal" data-target="#placeBet" 
				event="<?php echo $promoted_event['Fighter'][0]['name'] ?> vs <?php echo $promoted_event['Fighter'][1]['name'] ?>" 
				bet-name="<?php echo $bet_details['bet_name'] ?>" 
				bet-id="<?php echo $bet_details['bet_id'] ?>">
				<strong><?php echo $bet_details['odds'] ?></strong>
			</a>
		</div>
		<div class="span4">
			<?php $bet_details = $this->Html->betButton('X', $promoted_event['Bet']); ?>
			<a href="#" role="button" class="btn bet-btn" data-toggle="modal" data-target="#placeBet" 
				event="<?php echo $promoted_event['Fighter'][0]['name'] ?> vs <?php echo $promoted_event['Fighter'][1]['name'] ?>" 
				bet-name="<?php echo $bet_details['bet_name'] ?>" 
				bet-id="<?php echo $bet_details['bet_id'] ?>">
				<strong><?php echo $bet_details['odds'] ?></strong>
			</a>
		</div>
		<div class="span4">
			<?php $bet_details = $this->Html->betButton('2', $promoted_event['Bet']); ?>
			<a href="#" role="button" class="btn bet-btn" data-toggle="modal" data-target="#placeBet" 
				event="<?php echo $promoted_event['Fighter'][0]['name'] ?> vs <?php echo $promoted_event['Fighter'][1]['name'] ?>" 
				bet-name="<?php echo $bet_details['bet_name'] ?>" 
				bet-id="<?php echo $bet_details['bet_id'] ?>">
				<strong><?php echo $bet_details['odds'] ?></strong>
			</a>
		</div>
	</div>      

	<div class="row">&nbsp;</div>

	<?php 
		$otherBets = $this->Html->betButton('O', $promoted_event['Bet']);
		if (is_array($otherBets) && !empty($otherBets)): 
	?>
		<!-- Other bets -->
		<div class="row">
			<div class="span1"></div>
			<div class="span11">
				<h4>Other bets:</h4>
			</div>
		</div>
		<?php foreach($otherBets as $otherBet) :?>
			<!-- Bet option -->
			<div class="row">&nbsp;</div>
			<div class="row">
				<div class="span2"></div>
				<div class="span6">
					<p><?php echo $otherBet['bet_name'] ?></p>
				</div>
				<div class="span2 text-right">
					<a href="#" role="button" class="btn bet-btn" data-toggle="modal" data-target="#placeBet" 
						event="<?php echo $promoted_event['Fighter'][0]['name'] ?> vs <?php echo $promoted_event['Fighter'][1]['name'] ?>" 
						bet-name="<?php echo $otherBet['bet_name'] ?>" 
						bet-id="<?php echo $otherBet['id'] ?>">
						<?php echo $otherBet['odds'] ?>
					</a>
				</div>
				<div class="span2"></div>
			</div>
		<?php endforeach; ?>

	<?php endif; ?>

<?php else: ?>
	<div class="row text-center">
		<h3>No promoted events</h3>
	</div>
<?php endif; ?>


<?php if(!empty($events)): ?>

	<!-- Other fights -->
	<div class="row">&nbsp;</div>
	<div class="row">
		<div class="span1"></div>
		<div class="span11">
			<h4>Other fights:</h4>
		</div>
	</div>

	<?php foreach($events as $event): ?>

		<!-- Fight date -->
		<div class="row">&nbsp;</div>
		<div class="row">
			<div class="span2"></div>
			<div class="span10">
				<p><strong><?php echo $event['Event']['fight_date'] ?> (bets close <?php echo $event['Event']['bets_close_time'] ?> CET)</strong></p>
			</div>
		</div>

		<!-- Main bet -->
		<div class="row">&nbsp;</div>
		<div class="row">
			<div class="span2"></div>
			<div class="span5">
				<p><?php echo $event['Fighter'][0]['name'] ?> vs <?php echo $event['Fighter'][1]['name'] ?> 1x2</p>
			</div>
			<div class="span3 text-right">
				<?php $bet_details = $this->Html->betButton('1', $event['Bet']); ?>
				<a href="#" role="button" class="btn bet-btn" data-toggle="modal" data-target="#placeBet" 
					event="<?php echo $event['Fighter'][0]['name'] ?> vs <?php echo $event['Fighter'][1]['name'] ?>" 
					bet-name="<?php echo $bet_details['bet_name'] ?>" 
					bet-id="<?php echo $bet_details['bet_id'] ?>">
					<strong><?php echo $bet_details['odds'] ?></strong>
				</a>
				<?php $bet_details = $this->Html->betButton('X', $event['Bet']); ?>
				<a href="#" role="button" class="btn bet-btn" data-toggle="modal" data-target="#placeBet" 
					event="<?php echo $event['Fighter'][0]['name'] ?> vs <?php echo $event['Fighter'][1]['name'] ?>" 
					bet-name="<?php echo $bet_details['bet_name'] ?>" 
					bet-id="<?php echo $bet_details['bet_id'] ?>">
					<strong><?php echo $bet_details['odds'] ?></strong>
				</a>
				<?php $bet_details = $this->Html->betButton('2', $event['Bet']); ?>
				<a href="#" role="button" class="btn bet-btn" data-toggle="modal" data-target="#placeBet" 
					event="<?php echo $event['Fighter'][0]['name'] ?> vs <?php echo $event['Fighter'][1]['name'] ?>" 
					bet-name="<?php echo $bet_details['bet_name'] ?>" 
					bet-id="<?php echo $bet_details['bet_id'] ?>">
					<strong><?php echo $bet_details['odds'] ?></strong>
				</a>
				
			</div>
			<div class="span2"></div>
		</div>

		<?php 
			$otherBets = $this->Html->betButton('O', $event['Bet']);
			if (is_array($otherBets) && !empty($otherBets)): 
		?>
			<?php foreach($otherBets as $otherBet) :?>
				<!-- Bet option -->
				<div class="row">&nbsp;</div>
				<div class="row">
					<div class="span2"></div>
					<div class="span6">
						<p><?php echo $otherBet['bet_name'] ?></p>
					</div>
					<div class="span2 text-right">
						<a href="#" role="button" class="btn bet-btn" data-toggle="modal" data-target="#placeBet" 
							event="<?php echo $event['Fighter'][0]['name'] ?> vs <?php echo $event['Fighter'][1]['name'] ?>" 
							bet-name="<?php echo $otherBet['bet_name'] ?>" 
							bet-id="<?php echo $otherBet['id'] ?>">
							<strong><?php echo $otherBet['odds'] ?></strong>
						</a>
					</div>
					<div class="span2"></div>
				</div>
			<?php endforeach; ?>

		<?php endif; ?>

		<div class="row">&nbsp;</div>

	<?php endforeach; ?>

<?php else: ?>
	<div class="row text-center">
		<h3>No other events</h3>
	</div>
<?php endif; ?>