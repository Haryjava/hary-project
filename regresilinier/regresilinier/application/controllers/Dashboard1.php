<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard1 extends CI_Controller{
	public $model = NULL;
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Master_tiket');
		$this->model = $this->Master_tiket;
		$this->load->database();
	}

	public function master_tiket(){
		$sumTicket	= $this->model->gettiket();
		$sumOverdue	= $this->model->getoverdue();
		$sumClose	= $this->model->getclose();
		$sumTotal	= $this->model->gettotal();

		$data['OpenTicket']			= $sumTicket;
		$data['Overdue']			= $sumOverdue;
		$data['Close']			    = $sumClose;
		$data['Total']			    = $sumTotal;
		$this->load->view('dashboard1',$data);
	}

 	
}