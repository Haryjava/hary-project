<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Master_tiket extends CI_Model{

		public function __construct() {
		parent::__construct();
		
		$this->load->database();
	}

		public function gettiket(){
			
			$query = $this->db->query("SELECT count(*) as c FROM tiket where status='open' ");
			return $query->result();
		}	

		public function getoverdue(){
			
			$query = $this->db->query("SELECT count(*) as c FROM tiket where status='duedate' ");
			return $query->result();

	}
		
		public function getclose(){
			
			$query = $this->db->query("SELECT count(*) as c FROM tiket where status='close' ");
			return $query->result();

			
}
public function gettotal(){

			$query = $this->db->query("SELECT count(*)  as c FROM tiket ");
			return $query->result();
}
}