<?php 
//Models and Controllers must named with mixed case, ie. uppercase first letter

class Upload_model extends CI_Model{

	function __construct(){

		parent::__construct();

	}// \__construct

	function get_uploads(){

		$this->db->select('*');
		$this->db->from('user_uploads a');
		$this->db->join('tank_users b', 'b.id = a.author_id', 'left');
		$this->db->join('robson_valley_trails c', 'c.trail_id = a.trail_id', 'left');
		$this->db->where( 'approved', 1 );
		$query = $this->db->get();

		return $query->result();

	}//\get_letters

	function get_unapproved_uploads(){

		$this->db->select('*');
		$this->db->from('user_uploads');
		$this->db->where( 'approved', 0 );
		$query = $this->db->get();

		return $query->result();

	}//\get_letters

	function get_upload_detail($id){

		$this->db->where( 'file_id', $id); //name of column, what we are matching to the column
		$query = $this->db->get('user_uploads');
		return $query->result();

	}// \get_letter_detail

	function insert_upload($data){
		//print_r($data);
		$this->db->insert('user_uploads', $data);
	}

	function edit_upload($data, $id){
		//print_r($data);
		//where clause...
		$this->db->where( 'file_id', $id);
		//insert...
		$this->db->update('user_uploads', $data);
	}//\edit_letter


	function delete_upload($id){
		//print_r($id);
		//where clause...
		$this->db->where( 'file_id', $id);
		//delete...
		$this->db->update('user_uploads');
	}//\edit_letter

}// \Crud_model