<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Teacherlist_model extends CI_Model{

  	public function __construct(){
  		parent::__construct();

    }

    public function get_teacher_details($user_role,$class_id,$subject_id,$lat,$lng){

       $this->db->select('teachers.latitude,teachers.longitude,teachers.id,teachers.first_name as name,teachers.total_experience,CONCAT("https://taktii.live/kZD0rgbzHk/api/profile_image/",teachers.profile_img) as profile_img,teachers.per_address,teacher_professional_details.class_name,(select GROUP_CONCAT(subject_name) from teacher_professional_details as a where a.teacher_id=teachers.id ) as subject_name,teachers.user_role');
       $this->db->join('teachers', 'teachers.id = teacher_professional_details.teacher_id','right');
       $this->db->where('teachers.status', '1');
       $this->db->where('teachers.latitude!=','');
       $this->db->where('teachers.longitude!=','');
       $this->db->where('teachers.first_name!=','');
       $this->db->where_in('teacher_professional_details.class_id',$class_id);
       $this->db->where_in('teacher_professional_details.subject_id',$subject_id);


       if(isset($user_role) AND $user_role != '0'){
         $this->db->where('teachers.user_role', $user_role);
         }

       // $this->db->from('teachers');
       // $where .= "teacher_professional_details.class_id = ".$class_id." ";
       // $count = count($subject_id);
       //  $where .= " AND ( ";
       //  $counnnt = 0;
       //  foreach ($subject_id as $value) {
       //    if($counnnt == 0){
       //      $where .= " teacher_professional_details.subject_id = ".$value['id']." ";
       //    }else{

       //      $where .= " OR teacher_professional_details.subject_id = ".$value['id']." ";
       //    }
       //    //$this->db->or_where('teacher_professional_details.subject_id', $value['id']);
       //    $counnnt++;
       //  }
       //  $where .= " )";
       //  $this->db->where($where);
       //  $this->db->join('teacher_professional_details', 'teacher_professional_details.teacher_id = teachers.id','teachers.id != null');
       //  $this->db->group_by('teacher_professional_details.teacher_id');

       //  $query = $this->db->get();
       //  $result = $query->result_array();

    $this->db->group_by('teacher_professional_details.teacher_id');
		$query = $this->db->get('teacher_professional_details');
		$result = $query->result_array();
    


	    echo "<pre>";
	   print_r($result);
	   echo "</pre>";
	  $final_arra=array();
			foreach($result as $sort_arra){
			  $this->load->model('Home_model');
			  $get_dis = $this->Home_model->cal_distance($lat,$lng, $sort_arra['latitude'], $sort_arra['longitude'], 'K');
			if($get_dis  <= '15'){
			$final_arra[]=$sort_arra;
			}
		}
	  
	     
	   return  $result ;
	    
    }
   
	 
  }
