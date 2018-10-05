<?php

class Main extends CI_Controller {

	public function index()
	{

		$this->load->view('main');
	}

	public function change_type()
	{
		$type = $_POST['type'];

		$data['type'] = $type;

		if ($type == 'JPY') $type = 'USDT';

		$this->load->model('Main_Model');

		$result = $this->Main_Model->get_data($type);

		$data['data'] = $result;


		$result = $this->load->view('data', $data);
	}
}
