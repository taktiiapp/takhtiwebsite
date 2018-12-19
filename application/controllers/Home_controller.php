<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_controller extends CI_Controller {

	/**
	 *    Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
        parent::__construct();
    
        $this->load->model(array('Home_model','Teacherlist_model','Teacherabout_model'));
        $this->load->database();
       
    }

	public function index(){
		$data['courses'] = $this->Home_model->get_course_details();
		$data['map'] = $this->Home_model->home_map_data();
		$this->load->view('include/header',$data);
		$this->load->view('home_view',$data);
		$this->load->view('include/footer',$data);
	}

	//Get class for teaching subject
	public function get_classes_by_course(){
		$courses_id = $this->input->get('courses_id');
		$data = $this->Home_model->get_class_details($courses_id);
		//print_r($data);
		foreach ($data as $key => $value) {
			echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
			//echo '<option value="'.$value["id"].'#'.$value["name"].'">'.$value["name"].'</option>';
		}
	}

	//Get subjects for teaching subject.////////
	public function get_subjects_by_classes(){
		$class_id = $this->input->get('class_id');
		$arr = explode('#', $class_id);
		$c_id = $arr['0'];
		$data = $this->Home_model->get_subject_details($c_id);
		//print_r($data);
		foreach ($data as $key => $value) {
			echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
			//echo '<option value="'.$value["id"].'#'.$value["name"].'">'.$value["name"].'</option>';
		}
	}


	//Search teacher for home page
	public function search_teacher(){
        $data = $this->input->post('search');

        $subject_id =  $data['subject_id'];
        $class_id =  $data['class_id'];
        $user_role  =  $data['user_role'];
        $address    =  $data['address'];
        $url="https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($address)."&key=AIzaSyDkmRzgPT_YinELO77cj-Sju5IsqUrfrn0";
		$data = file_get_contents($url);
		$data = mb_substr($data, strpos($data, '{'));
		$data = mb_substr($data, 0, -1);
		$result = json_decode($data, true);
	    $temp_arra= $result['results'][0]['geometry']['location'];


		$lat= $temp_arra['lat'];
		$lng= $temp_arra['lng'];

		$t_list = $this->Teacherlist_model->get_teacher_details($user_role,$class_id,$subject_id,$lat,$lng);


		$data = array(
			'teacher_list' => $t_list
		);
		//print_r($data);die;
		$this->load->view('include/header_teacherview',$data);
		$this->load->view('teacherlist_view',$data);
		$this->load->view('include/footer',$data);
		
		
	}

	//fetch teacher profile info
	public function teacher_detail($id){
		$info = $this->Teacherabout_model->get_teacher_about($id);
		$data = array(
			'info' => $info
		);
	 	$this->load->view('include/header_teacherdetail',$data);
	 	$this->load->view('teacherdetail',$data);
		$this->load->view('include/footer',$data);
	}

	//fetch teacher running batch info
	public function teacher_running_batch_detail($id){
		$batchinfo = $this->Teacherabout_model->get_teacher_about($id);
		$data = array(
			'batchinfo' => $batchinfo
		);
	 	$this->load->view('include/header_teacher_running_batch',$data);
	 	$this->load->view('teacher_running_batch',$data);
		$this->load->view('include/footer',$data);
	}

	


}
