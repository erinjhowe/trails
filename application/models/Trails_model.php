<?php 
//Models and Controllers must named with mixed case, ie. uppercase first letter

class Trails_model extends CI_Model{

	function __construct(){

		parent::__construct();

	}// \__construct

	function get_trails(){

		$query = $this->db->get('robson_valley_trails');
		return $query->result();

	}//\get_letters

/*	function get_trails(){

		$query = $this->db->get('robson_valley_trails');
		return $query->result();

	}//\get_letters*/

	function get_trail_detail($id){
		$this->db->select('*');
		$this->db->from('robson_valley_trails');
		$this->db->where( 'robson_valley_trails.trail_id', $id); //name of column, what we are matching to the column
		$query = $this->db->get();
		return $query->result();
	}// \get_letter_detail


	function get_report_detail($id){

		$this->db->select('*');
		$this->db->from('trail_reports');
		$this->db->join('tank_users', 'tank_users.id = trail_reports.author_id');
		$this->db->where( 'report_id', $id); //name of column, what we are matching to the column
		$query = $this->db->get();
		return $query->result();

	}// \get_report_detail

/*	function get_trail_name($id){

		$this->db->where( 'id', $id); //name of column, what we are matching to the column
		$query = $this->db->get('robson_valley_trails');
		/*$results = $query['trail_name'];*/
		//get trail name from db table
		//return $query->$results();

	//}// \get_letter_detail*/

/*	function get_reports($trail_name){
		$this->db->where('trail_name', $trail_name);
		$query = $this->db->get('trail_reports');
		return $query->results();
	}*/

	function insert_trail($data){
		//print_r($data);
		$this->db->insert('robson_valley_trails', $data);
	}

	function edit_trail($data, $id){
		//print_r($data);
		//where clause...
		$this->db->where( 'trail_id', $id);
		//insert...
		$this->db->update('robson_valley_trails', $data);
	}//\edit_letter


	function delete_trail($id){
		//print_r($id);
		//where clause...
		$this->db->where( 'trail_id', $id);
		//delete...
		$this->db->delete('robson_valley_trails');
	}//\edit_letter

}// \Trail_model