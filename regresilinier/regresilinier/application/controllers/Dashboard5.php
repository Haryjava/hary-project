<?php
/**
 * Created by PhpStorm.
 * User: hary
 * Date: 8/1/2016
 * Time: 4:44 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard5 extends CI_Controller {

    public function index()
    {
        $this->load->view('dashboard5');
    }
}