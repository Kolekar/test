<?php 

class Reports_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	//add Package
	public function  add_packages($data){

			  $result = $this->db->insert('packages', $data);
		      return $result;
     }
	// view Package 
	 function view_reports(){
		 $query = $this->db->where('package_status','1');
		 $query = $this->db->get('packages');
		 $result = $query->result();
		 return $result;
	}

 function search($data){


         $this->db->select('profiles.*,membership_details.membership_package,active_members.date_time');
         $this->db->from('profiles');
         $this->db->join('membership_details', 'profiles.matrimony_id = membership_details.matrimony_id','left');
         $this->db->join('active_members', 'profiles.matrimony_id = active_members.user_id','left');
         if($data['country']!=0){
         $query = ($this->db->where('profiles.country',$data['country']));
         }if($data['city']!=0){
		 $query = $this->db->where('profiles.city',$data['city']);	
		 }if($data['religion']!=0){
		 $query = $this->db->where('profiles.religion',$data['religion']);
		 }if($data['gender']!=null){
		 $query = $this->db->where('gender',$data['gender']);
		 }if($data['member_type']!=null && $data['member_type']=='1'){
		 $query = $this->db->where('membership_details.membership_package','1');
		 }if($data['member_type']!=null && $data['member_type']=='3'){
		 $query = $this->db->where('membership_details.membership_package !=','1');
		 }if($data['member_type']!=null && $data['member_type']=='2'){
		 $date=date('Y-m-d', strtotime('-15 days'));
		 $query = $this->db->where('active_members.date_time <=',$date);
		 }
		 $query = $this->db->get();
		 $result = $query->result();
		 return $result;
	}

  public function get_packages() {
  	   $my_matr_id = $this->session->userdata('logged_in');
	   $mat_id=$my_matr_id->matrimony_id;
       $this->db->select('packages.package_name,membership_details.membership_package,membership_details.matrimony_id,profiles.matrimony_id');
       $this->db->from('packages');
       $this->db->join('membership_details', 'packages.id = membership_details.membership_package','left');
       $this->db->join('profiles', 'profiles.matrimony_id = membership_details.matrimony_id','left');
       $query = $this->db->where('packages.package_status','1');
       //$query = $this->db->where('membership_details.matrimony_id',$mat_id);
       $query = $this->db->get();
       $result = $query->result();
       return $result;
  }	
	 public function delete_package($id,$data1){
		 
		 $this->db->where('id', $id);
		 $result = $this->db->update('packages',$data1);
         return $result;
		 
		 
	 }

	public function editget_package_id($id){
		 
		 $query = $this->db->where('id',$id);
		 $query = $this->db->get('packages');
		 $result = $query->row();
		 return $result;
	 }
	 //edit package
	 public function edit_package($data, $id){
		 
		 $this->db->where('id',$id);
		 $result = $this->db->update('packages',$data);
		 return $result;		 
	 }
 
	// view Package 
	 function view_manage_packages(){
		 $query = $this->db->where('package_manage_status','1');
		  $query = $this->db->where('package_status','1');
		 $query = $this->db->get('packages');
		 $result = $query->result();
		 return $result;
	}
 	
	 public function manage_package($data){
		 
		 $this->db->where('id',$data['id']);
		 $result = $this->db->update('packages',$data);
		 return $result;		 
	 }

public function edit_manage_package($data, $id){
		 
		 $this->db->where('id',$id);
		 $result = $this->db->update('packages',$data);
		 return $result;		 
	 }
  public function delete_manage_package($id,$data1){
		 
		 $this->db->where('id', $id);
		 $result = $this->db->update('packages',$data1);
         return $result;	 
	 }
	 // DATE_FORMAT(created_date, '%m') as 'month'  DATE_FORMAT(created_date, '%Y') as 'y'

	public function get_graph_details() {
		$query = $this->db->query("SELECT DATE_FORMAT(created_date, '%Y-%m') as 'y' , COUNT(profile_id) as 'total' FROM profiles GROUP BY DATE_FORMAT(created_date, '%Y%m')");
		 if($query->num_rows() > 0){ return $query->result(); } else { return false; }
	}

	public function getTable($select,$where,$tbl_name) {
	    if($select != "") { $this->db->select($select); }
	    if($where != "") { foreach($where as $row) {
	            $this->db->where($row);
	      }}
	    $qry_5 = $this->db->get($tbl_name);
	    if($qry_5->num_rows() > 0){ return $qry_5->result(); } else { return false; }
  	}


/*		 
	 public function get_categorydetails() {
		              
					 
				$query = $this->db->get('category');
			    $result = $query->result();
			    return $result; 				
	 }
	 
	 
		 //popup promocode
	 function get_promopopupdetails($id){
	
				$this->db->select('*'); 			
                $this->db->from('promocode');              				
                $this->db->where('id',$id); 
                $query = $this->db->get();			
			    $result = $query->row();	
			    return $result;				
	         }*/
	 
	 }