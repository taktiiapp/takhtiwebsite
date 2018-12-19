<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Teacherlist_controller extends CI_Controller { 
    
    public function __construct(){
        parent::__construct();
		$this->load->model(array('Teacherlist_model'));
        $this->load->database();
    }

	public function index(){

		$t_list = $this->Teacherlist_model->get_teacher_details();
		//print_r($t_list);die;
		$data = array(
			'teacher_list' => $t_list
		);
		//print_r($data);die;
		$this->load->view('include/header_teacherview',$data);
		$this->load->view('teacherlist_view',$data);
		$this->load->view('include/footer',$data);

	}

}
