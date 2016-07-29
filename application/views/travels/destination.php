<p><a href="/travels">Home</a> | <a href="/users/logout">Logout</a></p>

<h1><?= $trip_info['destination'] ?></h1>

<p>Planned by: <?= $trip_info['name'] ?></p>
<p>Description: <?= $trip_info['description'] ?></p>
<p>Date From: <?= date('F j, Y', strtotime($trip_info['date_from'])) ?></p>
<p>Date To: <?= date('F j, Y', strtotime($trip_info['date_to'])) ?></p>

<h3>Other Users Joining the Trip</h3>

<?php foreach ($joiners as $joiner) { ?>
	<p><?= $joiner['name'] ?></p>
<?php } ?>