<?php
	echo $this->Form->input('fight_date', array('class' => 'input-small'));
	echo $this->Form->input('bets_close_time', array('class' => 'input-small', 'timeFormat' => 24));
	echo $this->Form->input('Fighter.0', array('label' => 'Fighter 1', 'type' => 'select', 'options' => $fighters));
	echo $this->Form->input('Fighter.1', array('label' => 'Fighter 2', 'type' => 'select', 'options' => $fighters));
	echo $this->Form->input('description', array('class' => 'input-xxlarge'));
?>