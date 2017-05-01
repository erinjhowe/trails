<?php //dont close php tag in controllers and models. You do in views..
//Models and Controllers must named with mixed case, ie. uppercase first letter
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function index(){ //public  functions - can be accessed from url, private functions cannot, can be accessed by other functions.
		echo "Yo Yo";
	}
	
	public function read()
	{
		//when working with a model, we must first load it. 
		$this->load->model('crud_model');
		$data['results'] = $this->crud_model->get_letters();

		//echo "<pre>"; //this perserves whitespace in HTML (JUST FOR TESTING)
		//print_r($data['results']); //for testing only! A way to see an array. (echo wont work for arrays)
		//echo "</pre>";


		// moving data from controller to view
	    $data['heading'] = "DB - Read";

		$this->load->view('includes/header');  
		$this->load->view('crud_read_view', $data);  //note: no .php extension
		$this->load->view('includes/footer');

	} //\read

	public function detail($id){

		$this->load->library('typography'); //this allows the use of built in code ignightor typography helper functions
		//could be loaded in config autoload - if it will be used in entire app - takes more time to load

		if(!is_numeric($id)){
			redirect('/', 'location'); //redirect the user if id is a bad value...
		} // \ if !numberic

		$this->load->model('crud_model');
		$data['results'] = $this->crud_model->get_letter_detail($id);

		/*echo "<pre>"; //this perserves whitespace in HTML (JUST FOR TESTING)
		print_r($data['results']); //(JUST FOR TESTING!!!!) A way to see an array (echo wont work for arrays).
		echo "</pre>";*/

		// moving data from controller to view
	    $data['heading'] = "DB - Letter Detail";

		$this->load->view('includes/header');  
		$this->load->view('crud_detail_view', $data);  //note: no .php extension
		$this->load->view('includes/footer');

	}//\detail

	public function create(){
		$this->load->library('form_validation');

		//style error messages
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger form-width">', '</div>');

		$this->form_validation->set_rules('letter', 'Letter', 'required|min_length[4]|max_length[40]|trim|strip_tags');
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[20]|max_length[800]|trim|strip_tags');

		if($this->form_validation->run() == FALSE){
			//validation not passed, so show form
			$this->load->view('includes/header');  
			$this->load->view('crud_create_view');  
			$this->load->view('includes/footer');  

		}else{ 
			//echo "SUCCESS"; 
			//get form values
			$data['letter'] = $this->input->post('letter');
			$data['description'] = $this->input->post('description');

			//do some DB stuff ALL DB STUFF HAPPENS IN MODELS
			$this->load->model('crud_model');
			$this->crud_model->insert_letter($data);

			//using the CI session library we will set a message in Flashdata that can be shown on the next page load only.
			$this->session->set_flashdata('message', 'Insert Successful');

			//redirect the user affter db insert
			redirect('crud/read', 'location');
		}

	}// \create

	public function edit($id){

		if(!is_numeric($id)){
			redirect('/', 'location'); //redirect the user if id is a bad value...
		} // \ if !numberic

		//load model right away, must be loaded before we can access the db
		$this->load->model('crud_model');

		$this->load->library('form_validation');
		//style error messages
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger form-width">', '</div>');

		$this->form_validation->set_rules('letter', 'Letter', 'required|min_length[4]|max_length[40]|trim|strip_tags');
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[20]|max_length[800]|trim|strip_tags');

		if($this->form_validation->run() == FALSE){

			$data['results'] = $this->crud_model->get_letter_detail($id);
			//validation not passed, so show form
			$this->load->view('includes/header');  
			$this->load->view('crud_edit_view', $data);  
			$this->load->view('includes/footer');  

		}else{ 
			//echo "SUCCESS"; 
			//get form values
			$data['letter'] = $this->input->post('letter');
			$data['description'] = $this->input->post('description');

			//do some DB stuff ALL DB STUFF HAPPENS IN MODELS
			
			$this->crud_model->edit_letter($data, $id);

			//using the CI session library we will set a message in Flashdata that can be shown on the next page load only.
			$this->session->set_flashdata('message', 'Edit Successful');

			//redirect the user affter db insert
			redirect("crud/detail/$id", 'location');
		}

	}// \edit


	public function delete($id){

		if(!is_numeric($id)){
			redirect('/', 'location'); //redirect the user if id is a bad value...
		} // \ if !numberic

		//load model right away, must be loaded before we can access the db
		$this->load->model('crud_model');
		$this->crud_model->delete_letter($id);

		//using the CI session library we will set a message in Flashdata that can be shown on the next page load only.
		//$this->session->set_flashdata('message', 'Edit Successful');

		//redirect the user affter db insert
		//redirect("crud/read", 'location');



	} //\delete

}//\CI_Controller
