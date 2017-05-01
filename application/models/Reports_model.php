<?php 
//Models and Controllers must named with mixed case, ie. uppercase first letter

class Reports_model extends CI_Model{

	function __construct(){

		parent::__construct();

	}// \__construct

	function get_reports(){

		$query = $this->db->get('trail_reports');
		return $query->result();

	}//\get_letters

	function get_report_detail($id){

		$this->db->select('*');
		$this->db->from('trail_reports');
		$this->db->join('tank_users', 'tank_users.id = trail_reports.author_id');
		$this->db->where( 'report_id', $id); //name of column, what we are matching to the column
		$query = $this->db->get();
		return $query->result();

	}// \get_report_detail


	function insert_report($data){
		//print_r($data);
		$this->db->insert('trail_reports', $data);
	}

	function edit_report($data, $id){
		//print_r($data);
		//where clause...
		$this->db->where( 'report_id', $id);
		//insert...
		$this->db->update('trail_reports', $data);
	}//\edit_letter


	function delete_report($id){
		//print_r($id);
		//where clause...
		$this->db->where( 'id', $id);
		//delete...
		$this->db->delete('trail_reports');
	}//\delete_report

}// \Reports_model