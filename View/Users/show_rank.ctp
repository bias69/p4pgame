<?php $i = 1; ?>
<div class="row">
	<div class="span12">
		<table class="table table-hover">
			<thead>
				<th>#</th>
				<th>Username</th>
				<th>Credits</th>
			</thead>
			<tbody>
				<?php foreach ($users as $user): ?>
					<tr>
						<td><?php echo $i++ ?></td>
						<td><?php echo $user['User']['username'] ?></td>
						<td><?php echo $user['User']['credits'] ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>