 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Teacherabout_model extends CI_Model{

  	public function __construct(){
  		parent::__construct();

    }

     public function base64url_encode($data) { 

          return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 

        }



      public function get_teacher_about($id){
        $this->db->select('teachers.id,teachers.first_name as name,teachers.mobile,teachers.gender,teachers.user_role,teachers.is_online,teachers.status,teachers.added_date,teachers.address,teachers.per_address,teachers.about_me,teacher_degree_details.degree_name,teacher_degree_details.description as des,teachers.total_experience,teacher_professional_details.class_name,teacher_professional_details.subject_name,teacher_technical_details.total_exp,teacher_technical_details.teaching_since,teacher_technical_details.description,teacher_teaching_details.institute_name,teacher_teaching_details.inst_address,teachers.profile_img,teacher_teaching_details.img_1');

        $this->db->where('teachers.id', $id);
        $this->db->join('teacher_degree_details', 'teacher_degree_details.teacher_id = teachers.id');
        $this->db->join('teacher_professional_details', 'teacher_professional_details.teacher_id = teachers.id');
        $this->db->join('teacher_technical_details', 'teacher_technical_details.teacher_id = teachers.id');
        $this->db->join('teacher_teaching_details', 'teacher_teaching_details.teacher_id = teachers.id');
        $result=$this->db->get('teachers');
        $result = $result->result();  
        return $result[0];

        }



}

       