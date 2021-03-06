<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Home_model extends CI_Model{

  	public function __construct(){
  		parent::__construct();
   		//$this->load->model(array('Home_model'));

    }

    public function get_course_details(){

      $query = $this->db->get('app_courses');
      $result = $query->result_array();
      return $result;   
    }


    public function get_class_details($courses_id){   
	    $this->db->select('*');
	    $this->db->where('courses_id', $courses_id);
      $query = $this->db->get('app_class');
      $result = $query->result_array();
      return $result;     
    }

        
    public function get_subject_details($class_id){
        $this->db->select('*');
        $this->db->where('class_id', $class_id);
        $query = $this->db->get('app_subjects');
        $result = $query->result_array();
       	return $result;   
           
    }
	
	 //ravish St//
		public function home_map_data(){
			$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://www.geoplugin.net/json.gp");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);
		$data = json_decode($server_output );
		$long = $data->geoplugin_longitude;
		$city = $data->geoplugin_city;
		$tude = $data->geoplugin_latitude;
		$sql= "SELECT total_experience,address,first_name,longitude,latitude,profile_img,about_me FROM `teachers`  where longitude!='' and latitude!=''  and status ='1' ";
	
		$result = $this->db->query($sql);
		$query = $result->result_array();
		 
			$final_arra=array();
			foreach($query as $sort_arra){
				 $get_dis = $this->cal_distance($tude, $long, $sort_arra['latitude'], $sort_arra['longitude'], 'K');
			if($get_dis  <= '15'){
			$final_arra[]=$sort_arra;
			}
		}
			// echo "<pre>";
			 return $final_arra;
			// echo "</pre>";
		}
	//ravish Ed//
	
	public function cal_distance($lat1, $lon1, $lat2, $lon2, $unit) {
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);
		if ($unit == "K") { return ($miles * 1.609344); } else if ($unit == "N") { return ($miles * 0.8684); } 
		else { return $miles; }

	}
	

}
	   