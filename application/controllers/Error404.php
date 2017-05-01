<?php //dont close php tag in controllers and models. You do in views..
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {

	
	public function index()
	{
		
		// moving data from controller to view

		$data['heading'] = "Error: Page Not Found";
		$data['content'] = "<p>Sorry, something is wrong.</p>";
		$data['picture'] = "error.jpg";

		$this->load->view('includes/header');  
		$this->load->view('error404_view', $data);  //note: no .php extension
		$this->load->view('includes/footer');
	}

}
