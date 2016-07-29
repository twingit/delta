<?php

date_default_timezone_set('America/Los_Angeles');

class Travel extends CI_Model {

	function create_trip($trip_params) {

		$this->form_validation->set_rules('destination', 'Destination', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('date_from', 'Date From', 'required');
		$this->form_validation->set_rules('date_to', 'Date To', 'required');

		if ($this->form_validation->run() === false) {
			
			$this->session->set_flashdata('errors', validation_errors());

			return false;

		} else {

			if ($trip_params['date_from'] < date('Y-m-d')) {

				$this->session->set_flashdata('date_from_error', "Trip must be today or later!");

				return false;

			} elseif ($trip_params['date_to'] <= $trip_params['date_from']) {
				
				$this->session->set_flashdata('date_to_error', "Date To must be after Day From!");

				return false;

			} else {
				
				$query = "INSERT INTO travels (user_id, destination, description, date_from, date_to, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
				$values = array($trip_params['user_id'], $trip_params['destination'], $trip_params['description'], $trip_params['date_from'], $trip_params['date_to'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));

				return $this->db->query($query, $values);

			}	

		}

	}

	function get_user_trips($user_id) {

		$query = "SELECT travels.*, creator.name as creator, joiner.name as joiner
				  FROM travels
				  JOIN users as creator
				  	ON travels.user_id = creator.id
				  LEFT JOIN joinups
				  	ON joinups.travel_id = travels.id
				  LEFT JOIN users as joiner
				  	ON joinups.user_id = joiner.id
				  WHERE creator.id = ? OR joiner.id = ?";
		$value = array($user_id, $user_id);

		return $this->db->query($query, $value)->result_array();

	}

	function get_other_user_trips($user_id) {

		$query = "SELECT users.name as creator, travels.*
				  FROM travels
				  JOIN users
					ON travels.user_id = users.id
				  WHERE travels.id
				  NOT IN (SELECT joinups.travel_id FROM joinups WHERE joinups.user_id = ?)";
		$value = array($user_id);

		return $this->db->query($query, $value)->result_array();

	}

	function get_trip_info($trip_id) {

		$query = "SELECT users.name, travels.*
				  FROM users
				  INNER JOIN travels
				  	ON travels.user_id = users.id
				  WHERE travels.id = ?";
		$value = array($trip_id);

		return $this->db->query($query, $value)->row_array();

	}

	function get_joiners($trip_id) {

		$query = "SELECT users.name
				  FROM users
				  JOIN joinups
				  	ON joinups.user_id = users.id
				  WHERE joinups.travel_id = ?";
		$value = array($trip_id);

		return $this->db->query($query, $value)->result_array();

	}

	function create_joinup($trip_id) {

		$current_user = $this->session->userdata['user_info']['id'];

		$query = "INSERT INTO joinups (user_id, travel_id) VALUES (?, ?)";
		$values = array($current_user, $trip_id);

		return $this->db->query($query, $values);

	}

	// function get_all_joinups($user_id) {

	// 	$query = "SELECT travels.*
	// 			  FROM users
	// 			  LEFT JOIN travels
	// 			  	ON travels.user_id = users.id
	// 			  LEFT JOIN joinups
	// 			  	ON joinups.travel_id = travels.id
	// 			  WHERE travels.user_id OR joinups.user_id = ?";
	// 	$value = array($user_id);

	// 	return $this->db->query($query, $value)->result_array();

	// }

}

?>