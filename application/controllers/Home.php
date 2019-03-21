<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			$data['main_view'] = 'home';
			$this->load->view('template', $data);
		} else {
			redirect('login/index');
		}
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */