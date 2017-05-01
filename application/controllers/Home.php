<?php //dont close php tag in controllers and models. You do in views..
//Models and Controllers must named with mixed case, ie. uppercase first letter
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		
		// moving data from controller to view

		$data['heading'] = "Robson Valley Trails";

		$this->load->view('includes/header');  
		$this->load->view('home_view', $data);  //note: no .php extension
		$this->load->view('includes/footer');
	}

}
