<?php 
//Models and Controllers must named with mixed case, ie. uppercase first letter

class Crud_model extends CI_Model{

	function __construct(){

		parent::__construct();

	}// \__construct

	function get_letters(){

		$query = $this->db->get('ci_letters');
		return $query->result();

	}//\get_letters

	function get_letter_detail($id){

		$this->db->where( 'id', $id); //name of column, what we are matching to the column
		$query = $this->db->get('ci_letters');
		return $query->result();

	}// \get_letter_detail

	function insert_letter($data){
		//print_r($data);
		$this->db->insert('ci_letters', $data);
	}

	function edit_letter($data, $id){
		//print_r($data);
		//where clause...
		$this->db->where( 'id', $id);
		//insert...
		$this->db->update('ci_letters', $data);
	}//\edit_letter


	function delete_letter($id){
		//print_r($id);
		//where clause...
		$this->db->where( 'id', $id);
		//delete...
		$this->db->delete('ci_letters');
	}//\edit_letter

}// \Crud_model