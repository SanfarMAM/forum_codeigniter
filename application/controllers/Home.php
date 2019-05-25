<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$username = $this->session->userdata('username');
		$password = $this->session->userdata('password');
		$is_user = $this->db->where(array(
			'username' => $username,
			'password' => $password
		))->get('tblaccount')->result('array');
		if ($is_user) {
			$data = array(
				'user_ID' => $this->session->user_ID,
				'username' => $username,
				'home_model' => $this->load->model('home_model')
			);
			// var_dump($data);die();
			$this->load->view('partials/header');
			$this->load->view('pages/home', $data);
			
		} else {
			$this->load->view('partials/header');
			$this->load->view('home');

		}
	}
}
