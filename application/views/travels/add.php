<p><a href="/travels">Home</a> | <a href="/users/logout">Logout</a></p>

<h1>Add a Trip</h1>

<?php

	if ($this->session->flashdata('errors')) {	
		echo $this->session->flashdata('errors');
	}

	if ($this->session->flashdata('date_from_error')) {
		echo $this->session->flashdata('date_from_error');
	}

	if ($this->session->flashdata('date_to_error')) {
		echo $this->session->flashdata('date_to_error');
	}

?>

<form action="/travels/create" method="post">
	<p>Destination: <input type="text" name="destination"></p>
	<p>Description: <input type="text" name="description"></p>
	<p>Travel Date From: <input type="date" name="date_from"></p>
	<p>Travel Date To: <input type="date" name="date_to"></p>
	<p><input type="submit" value="Add"></p>
</form>