<?php //dont close php tag in controllers and models. You do in views..
//Models and Controllers must named with mixed case, ie. uppercase first letter
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		if(!$this->tank_auth->is_logged_in()){
			redirect('/', 'location'); //redirect the user if id is a bad 
		}//\if !logged in

		$this->load->model('trails_model');
		$data['results'] = $this->trails_model->get_trails();

		$this->load->library('upload');
		$data['error'] = $this->upload->display_errors();

		//print_r($data);
		

		$this->load->view('includes/header'); 
		$this->load->view('upload_form', $data);
		$this->load->view('includes/footer');
	}

	function do_upload()
	{

		$this->load->model('upload_model');


		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		//$config['author_id']  = $this->input->post('author_id');

		//[orig_name] => tigerkitty.jpg 

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('includes/header'); 
			$this->load->view('upload_form', $error);
			$this->load->view('includes/footer');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			//$file_name = $this->upload->data('orig_name');

			$db_data['file_title'] = $this->input->post('file_title');
			$db_data['author_id'] = $this->input->post('author_id');
			$db_data['approved'] = $this->input->post('approved');
			$db_data['trail_id'] = $this->input->post('trail');
			$db_data['file_name'] = $this->upload->data('file_name');
			

			//print_r($db_data);
			$this->upload_model->insert_upload($db_data);
			$this->session->set_flashdata('message', 'Thank you for your contibution, all images require approval before publication.');
			redirect("upload", 'location');

		}
	}

	public function read()
	{
		$this->load->helper('date');
		//when working with a model, we must first load it. 
		$this->load->model('upload_model');
		$data['results'] = $this->upload_model->get_uploads();

		

		//echo "<pre>"; //this perserves whitespace in HTML (JUST FOR TESTING)
		//print_r($data['results']); //for testing only! A way to see an array. (echo wont work for arrays)
		//echo "</pre>";


		// moving data from controller to view
	    $data['heading'] = "Gallery";

		$this->load->view('includes/header');  
		$this->load->view('upload_read_view', $data);  //note: no .php extension
		$this->load->view('includes/footer');

	} //\read

	public function approve(){

		if(!$this->tank_auth->is_logged_in()){
			redirect('/', 'location'); //redirect the user if id is a bad 
		}//\if !logged in

		//load model right away, must be loaded before we can access the db
		$this->load->model('upload_model');
		$data['results'] = $this->upload_model->get_unapproved_uploads();
			//validation not passed, so show form

			$data['heading'] = "Unpublished Images";
			$this->load->view('includes/header');  
			$this->load->view('upload_approve_view', $data);  
			$this->load->view('includes/footer');  

			//using the CI session library we will set a message in Flashdata that can be shown on the next page load only.
			//$this->session->set_flashdata('message', 'Edit Successful');

			//redirect the user affter db insert
			//redirect("trails/detail/$id", 'location');
	

	}// \edit

	public function edit($id){

		if(!is_numeric($id)){
			redirect('/', 'location'); //redirect the user if id is a bad value...
		} // \ if !numberic

		//load model right away, must be loaded before we can access the db
		$this->load->model('upload_model');

		$this->load->library('form_validation');
		//style error messages
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger form-width">', '</div>');

		$this->form_validation->set_rules('file_title', 'File Title', 'required|min_length[4]|max_length[40]|trim|strip_tags');

		if($this->form_validation->run() == FALSE){

			$data['results'] = $this->upload_model->get_upload_detail($id);
			//validation not passed, so show form
			$this->load->view('includes/header');  
			$this->load->view('upload_edit_view', $data);  
			$this->load->view('includes/footer');  

		}else{ 
			//echo "SUCCESS"; 
			//get form values
			$data['file_title'] = $this->input->post('file_title');
			$data['approved'] = $this->input->post('approved');

			//do some DB stuff ALL DB STUFF HAPPENS IN MODELS
			
			$this->upload_model->edit_upload($data, $id);

			//using the CI session library we will set a message in Flashdata that can be shown on the next page load only.
			$this->session->set_flashdata('message', 'Image had been publish');

			//redirect the user affter db insert
			redirect("upload/approve", 'location');
		}

	}// \edit
}

