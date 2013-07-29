<?php echo $this->element('events_navbar'); ?>

<div class="row">
	<div class="span12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Status</th>
					<th>Fight Date</th>
					<th>Fighters</th>
					<th>Bets Close Time</th>
					<th>Result</th>
					<th>Actions</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($events as $event): ?>
				<!-- table row -->
				<tr>
					<td><span class="<?php echo $this->Html->eventStatusBtn($event['Event']['status']); ?>"><?php echo $event['Event']['status']; ?></span></td>
					<td><?php echo $event['Event']['fight_date']; ?></td>
					<td>
						<?php
							$i = 0;
							foreach ($event['Fighter'] as $fighter) {
								echo $fighter['name'].' ';
								if ($i == 0) echo 'vs ';
								$i++;
							}
						?>
					</td>
					<td><?php echo $event['Event']['bets_close_time'] ?> (CET)</td>
					<td><?php echo $this->Html->resultIcon($event['Event']['result']); ?></td>
					<td>
						<?php if($event['Event']['status'] == 'Draft'): ?>
							<a href="/admin/events/edit/<?php echo $event['Event']['id'] ?>" class="btn btn-warning">Edit</a>
						<?php endif; ?>
						<?php if($event['Event']['status'] == 'Draft'): ?>
							<a href="/admin/events/publish/<?php echo $event['Event']['id'] ?>" class="btn btn-success">Publish</a>
						<?php endif; ?>
						<?php if($event['Event']['status'] == 'Published' && $event['Event']['bets_close_time'] > date('Y-m-d G:i:s')): ?>
							<a href="/admin/events/unpublish/<?php echo $event['Event']['id'] ?>" class="btn">Unpublish</a>
						<?php endif; ?>
						<?php if($event['Event']['status'] == 'Draft'): ?>
							<?php echo $this->Html->link(__('Delete'), array('controller' => 'events', 'action' => 'delete', $event['Event']['id']), 
								array('class' => 'btn btn-danger'), __('Are you sure you want to delete this event?')); ?>
						<?php endif; ?>						
						<?php if($event['Event']['status'] == 'Published' && $event['Event']['promoted'] == false && $event['Event']['bets_close_time'] > date('Y-m-d G:i:s')): ?>
							<a href="/admin/events/promote/<?php echo $event['Event']['id'] ?>" class="btn btn-info">Promote</a>
						<?php endif; ?>
						<?php if($event['Event']['status'] == 'Published' && $event['Event']['promoted'] == true && $event['Event']['bets_close_time'] > date('Y-m-d G:i:s')): ?>
							<a href="/admin/events/unpromote/<?php echo $event['Event']['id'] ?>" class="btn">Unpromote</a>
						<?php endif; ?>
						<?php if($event['Event']['status'] == 'Published' && $event['Event']['bets_close_time'] <= date('Y-m-d G:i:s')): ?>
							<a href="/admin/events/end_event/<?php echo $event['Event']['id'] ?>" class="btn btn-danger">End</a>
						<?php endif; ?>
						<?php if($event['Event']['status'] == 'Ended'): ?>
							<a href="/admin/events/payout/<?php echo $event['Event']['id'] ?>" class="btn btn-danger">Payout</a>
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; ?>

			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="span12">
		<a href="/admin/events/add" class="btn btn-primary">New Event</a>
	</div>
</div>
<div class="row">&nbsp;</div>

	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pagination">
		<ul>
	<?php
		echo $this->Paginator->prev(__('Prev'), array('escape' => false, 'tag' => 'li', 'disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '', 'currentClass' => 'active', 'currentTag' => 'a'));
		echo $this->Paginator->next(__('Next'), array('escape' => false, 'tag' => 'li', 'disabledTag' => 'a'));
	?>
		</ul>
	</div>
</div>
