<p>Welcome, <?= $current_user['name'] ?>! (<a href="/users/logout">Logout</a>)</p>

<h3>Your Travel Plans</h3>

<table>
	<thead>
		<tr>
			<th>Destination</th>
			<th>Travel Start Date</th>
			<th>Travel End Date</th>
			<th>Plan</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($user_trips as $trip) { ?>
		<tr>
			<td><a href="/travels/destination/<?= $trip['id'] ?>"><?= $trip['destination'] ?></a></td>
			<td><?= date('F j, Y', strtotime($trip['date_from'])) ?></td>
			<td><?= date('F j, Y', strtotime($trip['date_to'])) ?></td>
			<td><?= $trip['description'] ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<h3>Other Users' Travel Plans</h3>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Destination</th>
			<th>Travel Start Date</th>
			<th>Travel End Date</th>
			<th>Do You Want to Join?</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($other_user_trips as $trip) { ?>
			<?php if ($trip['user_id'] != $current_user['id']) { ?>
				<tr>
					<td><?= $trip['creator'] ?></td>
					<td><a href="/travels/destination/<?= $trip['id'] ?>"><?= $trip['destination'] ?></a></td>
					<td><?= date('F j, Y', strtotime($trip['date_from'])) ?></td>
					<td><?= date('F j, Y', strtotime($trip['date_to'])) ?></td>
					<td><a href="/travels/joinup/<?= $trip['id'] ?>"><button>Join</button></a></td>
				</tr>
			<?php } ?>
		<?php } ?>
	</tbody>
</table>

<p><a href="/travels/add">Add Travel Plan</a></p>