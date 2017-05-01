<?php //dont close php tag in controllers and models. You do in views..
//Models and Controllers must named with mixed case, ie. uppercase first letter
defined('BASEPATH') OR exit('No direct script access allowed');

class Trails extends CI_Controller {

	public function index(){ //public  functions - can be accessed from url, private functions cannot, can be accessed by other functions.
		echo "Yo Yo";
	}
	
	public function read()
	{
		//when working with a model, we must first load it. 
		$this->load->model('trails_model');
		$data['results'] = $this->trails_model->get_trails();

		//echo "<pre>"; //this perserves whitespace in HTML (JUST FOR TESTING)
		//print_r($data['results']); //for testing only! A way to see an array. (echo wont work for arrays)
		//echo "</pre>";


		// moving data from controller to view
	    $data['heading'] = "Robson Valley Trails";

		$this->load->view('includes/header');  
		$this->load->view('trails_read_view', $data);  //note: no .php extension
		$this->load->view('includes/footer');

	} //\read

	public function detail($id){

		$this->load->library('typography'); //this allows the use of built in code ignightor typography helper functions
		//could be loaded in config autoload - if it will be used in entire app - takes more time to load

		if(!is_numeric($id)){
			redirect('/', 'location'); //redirect the user if id is a bad value...
		} // \ if !numberic

		$this->load->model('trails_model');
		$data['results'] = $this->trails_model->get_trail_detail($id);

		//$data['results'] = $this->trails_model->get_reports($trail_name);

		//echo "<pre>"; //this perserves whitespace in HTML (JUST FOR TESTING)
		//print_r($data['gallery']); //(JUST FOR TESTING!!!!) A way to see an array (echo wont work for arrays).
		//echo ($data['results']['trail_name']);
		//print_r($data['results']);
		//echo "</pre>";

		//$var = array();
		//$var = ($data['results'][0]['trail_name']);

		//echo $var;

	/*	$trail_name = "";
		$values = array();
		//$array = $data['results'][0];
		//$trail_name = $array['trail_name'];

		foreach ($data['results'][0] as $row) 
		{
			echo $row->value;
		}

		return $values;

		echo "<pre>";
		print_r($values);
		echo "</pre>";
*/
		//echo $trail_name;

		// moving data from controller to view
	    $data['heading'] = "Trail Detail";

		$this->load->view('includes/header');  
		$this->load->view('trail_detail_view', $data);  //note: no .php extension
		$this->load->view('includes/footer');

	}//\detail

	public function create(){
		$this->load->library('form_validation');

		//style error messages
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger form-width">', '</div>');

		$this->form_validation->set_rules('trail_name', 'Trail Name', 'required|min_length[4]|max_length[40]|trim|strip_tags');
		$this->form_validation->set_rules('trail_description', 'Trail Description', 'required|min_length[20]|max_length[800]|trim|strip_tags');
		$this->form_validation->set_rules('trail_access', 'Trail Access', 'required|min_length[20]|max_length[800]|trim|strip_tags');
		$this->form_validation->set_rules('trail_length', 'Trail Length', 'required|numeric|min_length[1]|max_length[40]|trim|strip_tags');
		$this->form_validation->set_rules('elevation_gain', 'Elevation Gain', 'required|numeric|min_length[1]|max_length[40]|trim|strip_tags');

		if($this->form_validation->run() == FALSE){
			//validation not passed, so show form
			$this->load->view('includes/header');  
			$this->load->view('trail_create_view');  
			$this->load->view('includes/footer');  

		}else{ 
			//echo "SUCCESS"; 
			//get form values
			$data['trail_name'] = $this->input->post('trail_name');
			$data['trail_description'] = $this->input->post('trail_description');
			$data['trail_access'] = $this->input->post('trail_access');
			$data['area'] = $this->input->post('area');
			$data['shelter'] = $this->input->post('shelter');
			$data['trail_length'] = $this->input->post('trail_length');
			$data['elevation_gain'] = $this->input->post('elevation_gain');

			//do some DB stuff ALL DB STUFF HAPPENS IN MODELS
			$this->load->model('trails_model');
			$this->trails_model->insert_trail($data);

			//using the CI session library we will set a message in Flashdata that can be shown on the next page load only.
			$this->session->set_flashdata('message', 'Insert Successful');

			//redirect the user affter db insert
			redirect('trails/read', 'location');
		}

	}// \create

	public function edit($id){

		if(!is_numeric($id)){
			redirect('/', 'location'); //redirect the user if id is a bad value...
		} // \ if !numberic

		//load model right away, must be loaded before we can access the db
		$this->load->model('trails_model');

		$this->load->library('form_validation');
		//style error messages
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger form-width">', '</div>');

		$this->form_validation->set_rules('trail_name', 'Trail Name', 'required|min_length[4]|max_length[40]|trim|strip_tags');
		$this->form_validation->set_rules('trail_description', 'Trail Description', 'required|min_length[20]|max_length[800]|trim|strip_tags');
		$this->form_validation->set_rules('trail_access', 'Trail Access', 'required|min_length[20]|max_length[800]|trim|strip_tags');
		$this->form_validation->set_rules('trail_length', 'Trail Length', 'required|numeric|min_length[1]|max_length[40]|trim|strip_tags');
		$this->form_validation->set_rules('elevation_gain', 'Elevation Gain', 'required|numeric|min_length[1]|max_length[40]|trim|strip_tags');

		if($this->form_validation->run() == FALSE){

			$data['results'] = $this->trails_model->get_trail_detail($id);
			//validation not passed, so show form
			$this->load->view('includes/header');  
			$this->load->view('trail_edit_view', $data);  
			$this->load->view('includes/footer');  

		}else{ 
			//echo "SUCCESS"; 
			//get form values
			$data['trail_name'] = $this->input->post('trail_name');
			$data['trail_description'] = $this->input->post('trail_description');
			$data['trail_access'] = $this->input->post('trail_access');
			$data['area'] = $this->input->post('area');
			$data['shelter'] = $this->input->post('shelter');
			$data['trail_length'] = $this->input->post('trail_length');
			$data['elevation_gain'] = $this->input->post('elevation_gain');

			//do some DB stuff ALL DB STUFF HAPPENS IN MODELS
			
			$this->trails_model->edit_trail($data, $id);

			//using the CI session library we will set a message in Flashdata that can be shown on the next page load only.
			$this->session->set_flashdata('message', 'Edit Successful');

			//redirect the user affter db insert
			redirect("trails/detail/$id", 'location');
		}

	}// \edit


	public function delete($id){

		if(!is_numeric($id)){
			redirect('/', 'location'); //redirect the user if id is a bad value...
		} // \ if !numberic

		//load model right away, must be loaded before we can access the db
		$this->load->model('trails_model');
		$this->trails_model->delete_trail($id);

		//using the CI session library we will set a message in Flashdata that can be shown on the next page load only.
		//$this->session->set_flashdata('message', 'Edit Successful');

		//redirect the user affter db insert
		redirect("trails/read", 'location');



	} //\delete


}//\CI_Controller
