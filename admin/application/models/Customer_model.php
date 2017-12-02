<?php 
class Customer_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
	// view customer details
	public function get_profile_details($whr){
		$this->db->select('*');
        $this->db->join('height', 'profiles.height_id = height.height_id','left');
        $this->db->join('weight', 'profiles.weight_id = weight.weight_id','left');
        $this->db->join('religions', 'profiles.religion = religions.religion_id','left');
        $this->db->join('castes', 'profiles.caste = castes.caste_id','left');
        $this->db->join('sub_castes', 'profiles.sub_caste = sub_castes.sub_caste_id','left');
        $this->db->join('stars', 'profiles.star_id = stars.star_id','left');
        $this->db->join('raasi', 'profiles.raasi_id = raasi.raasi_id','left');
        $this->db->join('country', 'profiles.country = country.country_id','left');
        $this->db->join('states', 'profiles.state = states.state_id','left');
        $this->db->join('cities', 'profiles.city = cities.city_id','left');
        $this->db->join('educations', 'profiles.education_id = educations.education_id','left');
        $this->db->join('occupations', 'profiles.occupation_id = occupations.occupation_id','left');
        $this->db->join('mother_tongues', 'profiles.mother_language = mother_tongues.mother_tongue_id','left');
		$this->db->join('membership_details', 'membership_details.matrimony_id = profiles.matrimony_id','left');
		$this->db->join('packages', 'packages.id = membership_details.membership_package','left');
		$this->db->join('active_members', 'active_members.user_id = profiles.matrimony_id','left');
        if(!empty($whr)) {
            foreach($whr as $row) {
                $this->db->where($row);          
            }
        }
        $query = $this->db->get('profiles');
        $result = $query->result();         
        return $result;
    }

  public function getTable($select,$where,$tbl_name) {
    if($select != "") { $this->db->select($select); }
    if($where != "") { foreach($where as $row) {
            $this->db->where($row);
      }}
    $qry_5 = $this->db->get($tbl_name);
    if($qry_5->num_rows() > 0){ return $qry_5->result(); } else { return false; }
  }
    
    	 function view_packages1(){
		 $query = $this->db->where('package_status','1');
		 $query = $this->db->get('packages');
		 $result = $query->result();
		 return $result;
	}
   function view_packages($mat_id){
	 	 $this->db->select('packages.*,membership_details.membership_package,membership_details.matrimony_id');
         $this->db->from('packages');
         $this->db->join('membership_details', 'packages.id = membership_details.membership_package','left');
		// $query = $this->db->where('packages.package_status','1');
		 $query = $this->db->where('membership_details.matrimony_id',$mat_id);
		 $query = $this->db->get();
		 $result = $query->row();
		 return $result;
	}
   public function upgrade_members($data, $mat_id){
   		 $this->db->where('id',$data['package_id']);
		 $query = $this->db->get('packages');
		 $result = $query->row();
		 $month=$result->month;
		 $amount=$result->price;
   	    /* if($data['package_type']==1){	*/
		 $date=date('Y-m-d H:i:s', time());

		$interest = $this->getCount($mat_id,"interest_from","profile_interest");
		$mails = $this->getCount($mat_id,"mail_from","profile_mails");
		$views = $this->getCount($mat_id,"mobileview_from","mobile_view");
		$sms = $this->getCount($mat_id,"send_sms_from","send_sms");

		 $data1['total_interest']=$result->intrest_permonth + $interest;
		 $data1['total_sendmail']=$result->personalized_msg_permonth + $mails;
		 $data1['total_mobileview']=$result->verified_mob_permonth + $views;
		 $data1['total_sms']=$result->send_sms_permonth + $sms;
		 $data1['membership_package']=$data['package_id'];
		 $data1['membership_purchase']= date('Y-m-d H:i:s', time());
		 $data1['membership_expiry']= date('Y-m-d H:i:s', strtotime('+'.$month.' months'));
		 $this->db->where('matrimony_id',$mat_id);
		 $result = $this->db->update('membership_details',$data1);
		/*}else if($data['package_type']==2){
         $date=date('Y-m-d H:i:s', time());

		 $data2['total_interest']=$result->intrest_permonth;
		 $data2['total_sendmail']=$result->personalized_msg_permonth;
		 $data2['total_mobileview']=$result->verified_mob_permonth;
		 $data2['total_sms']=$result->send_sms_permonth;
		 $data2['addon_package']=$data['package_id'];
		 $data2['addon_purchase']= date('Y-m-d H:i:s', time());
		 $data2['addon_expiry']= date('Y-m-d H:i:s', strtotime('+'.$month.' months'));
		 $this->db->where('matrimony_id',$mat_id);
		 $result = $this->db->update('membership_details',$data2);
		}*/
		if($data['package_id']=='1'){
	    $data3['is_premium']='0';
		}else{
		$data3['is_premium']='1';
		}

		 $this->db->where('matrimony_id',$mat_id);
		 $result = $this->db->update('profiles',$data3);
         $data4['user_id']=$mat_id;
         $data4['package_id']=$data['package_id'];
         $data4['purchase_amount']=$amount;
         $data4['payment_method']=$data['payment_type'];
         $data4['purchase_date']=date('Y-m-d H:i:s', time());
		 $result1 = $this->db->insert('payments', $data4);
		 return $result;		 
	 }

	public function getCount($matr_id,$field,$table) {
        $qry=$this->db->get_where($table,array($field => $matr_id));
        $count = $qry->num_rows();
        return $count;
    }

	 function view_state(){
	 	 $this->db->select('packages.*,country.country_name');
         $this->db->from('packages');
         $this->db->join('country', 'country.country_id = states.country_id','left');
		 $query = $this->db->where('states.state_status','1');
		 $query = $this->db->get();
		 $result = $query->result();
		 return $result;
	}

    public function approve_member($prof_id){
		$this->db->where('profile_id',$prof_id);
		$result = $this->db->update('profiles',array("profile_approval" => 1,"profile_status" => 1));
		return $result;	 
	}
	function disablehighlight_members($data){ 
    	$this->db->where('matrimony_id',$data);
    	     $query = $this->db->where('profiles.profile_status','1');
     $query = $this->db->where('profiles.profile_approval','1');
		$result = $this->db->update('profiles',array("profile_highlight" => 1));
		return $result;
    }
	function updatehighlight_members($data){
		$this->db->where('matrimony_id',$data);
		     $query = $this->db->where('profiles.profile_status','1');
     $query = $this->db->where('profiles.profile_approval','1');
		$result = $this->db->update('profiles',array("profile_highlight" => 0));//echo $this->db->last_query();die;
		return $result;
    }
    
	public function reject_member($prof_id){
		$this->db->where('profile_id',$prof_id);
		$result = $this->db->update('profiles',array("profile_approval" => 0, "profile_status" => 0));
		return $result; 
	}

	public function delete_member($prof_id) {
		$this->db->where('profile_id',$prof_id);
		$result = $this->db->update('profiles',array("profile_approval" => 0, "profile_status" => 2));
		return $result;
	}

	public function ban_member($prof_id) {
		$this->db->where('profile_id',$prof_id);
		$result = $this->db->update('profiles',array("profile_approval" => 0, "profile_status" => 3));
		return $result;
	}

	public function edit_member($data, $id){ 
		$this->db->where('profile_id',$id);
		$result = $this->db->update('profiles',$data);
		return $result;		 
	}

	public function getProfilePics() {
	   $this->db->select('profile_pic_verification.*,profiles.profile_name,profiles.matrimony_id,profiles.profile_preference');
		$this->db->join('profiles', 'profiles.user_id = profile_pic_verification.user_id','left');
		$this->db->where('pic_status',0);
		$this->db->order_by('pic_datetime','desc');
		$qry=$this->db->get_where('profile_pic_verification');
        if($qry->num_rows() > 0) { return $qry->result(); ; } else { return false; }
    }
	public function getGalleryPics() {
		$this->db->join('profiles', 'pic_gallery.user_id = profiles.matrimony_id','left');
		$this->db->where('pict_status',1);
		$this->db->where('pic_approval',0);
		$this->db->order_by('date_time','desc');
		$qry=$this->db->get_where('pic_gallery');
		// echo $this->db->last_query();die;
        if($qry->num_rows() > 0) { return $qry->result(); ; } else { return false; }
    }
    public function getIdproofs() {
		$this->db->join('profiles', 'badge.user_id = profiles.matrimony_id','left');		
		$this->db->order_by('date_time','desc');
		$qry=$this->db->get_where('badge');
        if($qry->num_rows() > 0) { return $qry->result(); ; } else { return false; }
    }
    public function update_profile_pic($data,$mat_id,$pic_id) {
         $this->db->where('matrimony_id',$mat_id);
         $this->db->update('profiles',array("profile_photo" => $data));    
         //$this->db->update('profiles',array("profile_photo_blured" => ''));  

         $this->db->where('pic_verification_id',$pic_id);
         $this->db->update('profile_pic_verification',array("pic_status" => 1)); 
    }

 public function update_profile_pic_blur($data,$mat_id,$pic_id) {
         $this->db->where('matrimony_id',$mat_id);
         $this->db->update('profiles',array("profile_photo_blured" => $data));    
         //$this->db->update('profiles',array("profile_photo_blured" => ''));  

         $this->db->where('pic_verification_id',$pic_id);
         $this->db->update('profile_pic_verification',array("pic_status" => 1)); 
    }


// view profile pic	
	/* public function view_profilepic(){
		        $this->db->select('registration.name,registration.approval,photo_gallery.image,photo_gallery.user_id,photo_gallery.profilepic_status');
                $this->db->from('photo_gallery' );
                $this->db->join('registration', 'photo_gallery.user_id = registration.id','left');
                $this->db->where('photo_gallery.status',1);
                $query = $this->db->get();
                $result = $query->result();          
                return $result;

	 }
//approve profilepic	 
	 public function approve_profilepic($id,$data1){
		  		 $this->db->where('user_id',$id);
				 $result = $this->db->update('photo_gallery',$data1);
				 return $result;
		 
		 
	 }*/
//reject profilepic	 
	 public function reject_profilepic($user_id,$pic_id,$data1){
	 			 $this->db->where('pic_verification_id',$pic_id);
		  		 $this->db->where('user_id',$user_id);
				 $result = $this->db->update('profile_pic_verification',$data1);
				 return $result;
		 
		 
	 }	 	
//delete profilepic	 
	 public function delete_profilepic($user_id,$pic_id,$data1){
	 			 $this->db->where('pic_verification_id',$pic_id);
		  		 $this->db->where('user_id',$user_id);
				 $result = $this->db->update('profile_pic_verification',$data1);
				 return $result;
		 
		 
	 }
//approve gallerypic	 
	 public function approve_gallerypic($user_id,$id,$data1,$image_name1){
		  		 $this->db->where('id',$id);
		  		 $this->db->where('user_id',$user_id);
		  		 $data1['image_path_blur']=$image_name1;
				 $result = $this->db->update('pic_gallery',$data1);
				 return $result;
		 
		 
	 }
//reject gallerypic	 
	 public function reject_gallerypic($user_id,$id,$data1){
		  		 $this->db->where('id',$id);
		  		 $this->db->where('user_id',$user_id);
				 $result = $this->db->update('pic_gallery',$data1);
				 return $result;
		 
		 
	 }	 	
//delete gallerypic	 
	 public function delete_gallerypic($user_id,$id,$data1){
		  		 $this->db->where('id',$id);
		  		 $this->db->where('user_id',$user_id);
				 $result = $this->db->update('pic_gallery',$data1);
				 return $result;
	}			 
	public function getReligions() {
      $qry_1 = $this->db->get_where('religions',array('religion_status' => 1));
      if($qry_1->num_rows() > 0){ return $qry_1->result(); } else { return false; }
    }

    public function getMotherTongues() {
      $qry_3 = $this->db->get_where('mother_tongues',array('mother_tongue_status' => 1));
      if($qry_3->num_rows() > 0){ return $qry_3->result(); } else { return false; }
    }
}
?>