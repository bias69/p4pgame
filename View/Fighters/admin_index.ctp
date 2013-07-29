<div class="row">
	<div class="span12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Record</th>
					<th>Actions</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($fighters as $fighter): ?>
				<!-- table row -->
				<tr>
					<td><?php echo $fighter['Fighter']['id'] ?></td>
					<td><?php echo $fighter['Fighter']['name'] ?></td>
					<td><?php echo $fighter['Fighter']['record'] ?></td>
					<td>
						<a href="/admin/fighters/view/<?php echo $fighter['Fighter']['id'] ?>" class="btn btn-info">View</a>
						<a href="/admin/fighters/edit/<?php echo $fighter['Fighter']['id'] ?>" class="btn btn-warning">Edit</a>
					</td>
				</tr>
				<?php endforeach; ?>

			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="span12">
		<a href="/admin/fighters/add" class="btn btn-primary">New Fighter</a>
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
