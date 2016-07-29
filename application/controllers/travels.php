<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Travels extends CI_Controller {

	function __construct() {

		parent::__construct();
		$this->load->model('User');
		$this->load->model('Travel');

	}

	function index() {

		$current_user_id = $this->session->userdata['user_info']['id'];

		$data['current_user'] = $this->session->userdata('user_info');
		$data['user_trips'] = $this->Travel->get_user_trips($current_user_id);
		$data['other_user_trips'] = $this->Travel->get_other_user_trips($current_user_id);
		// $data['joinups'] = $this->Travel->get_all_joinups($current_user_id);

		$this->load->view('travels/travels', $data);

	}

	function add() {

		$this->load->view('travels/add');

	}

	function create() {

		$current_user = $this->session->userdata('user_info');

		$trip_params = array(

			'user_id' => $current_user['id'],
			'destination' => $this->input->post('destination'),
			'description' => $this->input->post('description'),
			'date_from' => $this->input->post('date_from'),
			'date_to' => $this->input->post('date_to')

		);

		if ($this->Travel->create_trip($trip_params)) {
			
			redirect('/travels');

		} else {
			
			redirect('/travels/add');

		}

	}

	function destination($trip_id) {

		$data['trip_info'] = $this->Travel->get_trip_info($trip_id);
		$data['joiners'] = $this->Travel->get_joiners($trip_id);

		$this->load->view('travels/destination', $data);

	}

	function joinup($trip_id) {

		$this->Travel->create_joinup($trip_id);
		redirect('/travels');

	}

}

?>