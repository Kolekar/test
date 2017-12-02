<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller {
	public function __construct() {
	parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Customer_model');
		$this->load->model('Settings_model');
		$this->load->model('Reports_model');
    }
	// view customer details	  
	public function view_members(){
		if($this->session->userdata('logged_in_admin')) {
			
			$settings        = get_settings();
        	$header['title'] = $settings->title . " | View Members";
			$data['members'] = $this->Customer_model->get_profile_details("");
			//$data['logintime']=$this->Customer_model->get_logintime($matr_id);
			$this->load->view('Templates/header',$header);
			$this->load->view('customer/view-members',$data);
			$this->load->view('Templates/footer');
		} else { redirect(base_url()); }
	  }
	public function upgrade_members(){
		if($this->session->userdata('logged_in_admin')) {
			$settings        = get_settings();
        	$header['title'] = $settings->title . " | Upgrade Members";		
			$this->load->view('Templates/header',$header);
			$mat_id = $this->uri->segment(3);
			$data['package'] = $this->Customer_model->view_packages($mat_id);
			$data['package1'] = $this->Customer_model->view_packages1();
			$this->load->view('customer/upgrade_members',$data);
			$this->load->view('Templates/footer');
			 if($_POST) {
					  
				  $data = $_POST;
				//  var_dump($data);
				 // die();
				   $result = $this->Customer_model->upgrade_members($data,$mat_id);
				 
				}
		} else { redirect(base_url()); }
	  }
	public function get_drop_data() {
		$sel_val = $this->input->post('sel_val');
		$sel_typ = $this->input->post('sel_typ');
		$where = array(); $tbl = "";

		if($sel_typ == "package") { 
			$tbl = "packages";
			$fld_name = "package_name";
			$where[] = "package_type = '".$sel_val."'"; 
		}  else { return false; }

		$drop_vals = $this->Reports_model->getTable("",$where,$tbl);

		$html = "";
		$html.= "<option value='0'>Select Package</option>";

		if($fld_name == "package_name") {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->id."'>".$drop_val->package_name."/Rs-".$drop_val->price."</option>";
			}
		} else {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->id."'>".$drop_val->package_name."/Rs-".$drop_val->price."</option>";
			}
		}
		echo $html;
	}
public function get_drop_data2() {
		$sel_val = $this->input->post('sel_val');
		$sel_typ = $this->input->post('sel_typ');
		$where = array(); 
		$tbl = "";

		if($sel_typ == "country") { 
			$tbl = "states";
			$fld_name = "State";
			$where[] = "country_id = '".$sel_val."'"; 
		} else if($sel_typ == "state") {
			$tbl = "cities";
			$fld_name = "City";
			$where[] = "state_id = '".$sel_val."'"; 
		} else { return false; }

		$drop_vals = $this->Reports_model->getTable("",$where,$tbl);

		$html = "";
		$html.= "<option value='0'>Select ".$fld_name."</option>";

		if($fld_name == "State") {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->state_id."'>".$drop_val->state_name."</option>";
			}
		} else {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->city_id."'>".$drop_val->city_name."</option>";
			}
		}
		echo $html;
	}
public function get_drop_data3() {
		$sel_val = $this->input->post('sel_val');
		$sel_typ = $this->input->post('sel_typ');
		$where = array(); 
		$tbl = "";

		if($sel_typ == "religion") { 
			$tbl = "castes";
			$fld_name = "Caste";
			$where[] = "religion_id = '".$sel_val."'"; 
		}  else { return false; }

		$drop_vals = $this->Reports_model->getTable("",$where,$tbl);

		$html = "";
		$html.= "<option value='0'>Select ".$fld_name."</option>";

		if($fld_name == "Caste") {
			foreach($drop_vals as $drop_val) {
				$html.= "<option value='".$drop_val->caste_id."'>".$drop_val->caste_name."</option>";
			}
		} 
		echo $html;
	}
	public function approve_member() {		
		if($this->session->userdata('logged_in_admin')) {							// Approve Customer
		  $prof_id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->approve_member($prof_id);
		  $this->session->set_flashdata('message', array('message' => 'Membership Approved','class' => 'success'));
		  redirect(base_url().'customer/view_members');
		} else { redirect(base_url()); }
	}
		public function highlight_members() {		
		if($this->session->userdata('logged_in_admin')) {							// Approve Customer
		  $prof_id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->updatehighlight_members($prof_id);
		  $this->session->set_flashdata('message', array('message' => 'Highlight Disabled ','class' => 'success'));
		  redirect(base_url().'customer/view_members');
		} else { redirect(base_url()); }
	}
		public function disable() {		
		if($this->session->userdata('logged_in_admin')) {							// Approve Customer
		  $prof_id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->disablehighlight_members($prof_id);
		  $this->session->set_flashdata('message', array('message' => ' Membership Highlighted','class' => 'success'));
		  redirect(base_url().'customer/view_members');
		} else { redirect(base_url()); }
	}
	
	
	
	public function reject_member() {													// Reject Customer
		if($this->session->userdata('logged_in_admin')) {	
		  $prof_id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->reject_member($prof_id);
		  $this->session->set_flashdata('message', array('message' => 'Membership Rejected','class' => 'success'));
		  redirect(base_url().'customer/view_members');
		} else { redirect(base_url()); } 
	}
	public function delete_member() {
		if($this->session->userdata('logged_in_admin')) {
		  $prof_id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->delete_member($prof_id);
		  $this->session->set_flashdata('message', array('message' => 'Membership Deleted','class' => 'success'));
		  redirect(base_url().'customer/view_members');
		} else { redirect(base_url()); } 
	}
	public function ban_member() {
		if($this->session->userdata('logged_in_admin')) {
		  $prof_id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->ban_member($prof_id);
		  $this->session->set_flashdata('message', array('message' => 'Membership Banned','class' => 'success'));
		  redirect(base_url().'customer/view_members');
		} else { redirect(base_url()); } 
	}
	public function edit_member() {
		if($this->session->userdata('logged_in_admin')) {
			$prof_id = $this->uri->segment(3);
			$whr[] = "profiles.profile_id = '".$prof_id."'";
			$data['prof_id'] = $prof_id;
			$data['profile'] = $this->Customer_model->get_profile_details($whr);
			$data['religions'] = $this->Customer_model->getReligions();
	        $data['mother_tongue'] = $this->Customer_model->getMotherTongues();
	        $settings        = get_settings();
        	$header['title'] = $settings->title . " | Edit Members";
			$this->load->view('Templates/header',$header);
			$data['religions'] = $this->Customer_model->getTable("","","religions");
				//$data['castes'] = $this->Home_model->getTable("","","castes");
				$data['mother_tongue'] = $this->Customer_model->getMotherTongues();
            	$data['stars'] = $this->Customer_model->getTable("","","stars");
            	$data['raasi'] = $this->Customer_model->getTable("","","raasi");
            	$data['educations'] = $this->Customer_model->getTable("","","educations");
            	$data['countries'] = $this->Customer_model->getTable("","","country");
            	$data['occupations'] = $this->Customer_model->getTable("","","occupations");
            	$data['heights'] = $this->Customer_model->getTable("","","height");
            	$data['weights'] = $this->Customer_model->getTable("","","weight");
			$this->load->view('customer/edit-customer',$data);
			$this->load->view('Templates/footer');
		} else { redirect(base_url()); } 
	}
	public function save_edited_details() {
		if($_POST) {
			$prof_id = $this->uri->segment(3);
			$result = $this->Customer_model->edit_member($_POST, $prof_id);
			if($result) {
				$this->session->set_flashdata('message',array('message' => ' Updated Successfully','class' => 'success'));
				redirect(base_url().'customer/view_members');
			} else {
				$this->session->set_flashdata('message', array('message' => "Something Went wrong.",'class' => 'danger'));	
				redirect(base_url().'customer/view_members');
			}
		}
	}
	public function view_profilepics() {
		if($this->session->userdata('logged_in_admin')) {
			$data['prof_pics'] = $this->Customer_model->getProfilePics();
			//print_r($data['prof_pics']);die;
			$settings        = get_settings();
        	$header['title'] = $settings->title . " | View Profile";
			$this->load->view('Templates/header',$header);
			$this->load->view('customer/view-profilepic',$data);
			$this->load->view('Templates/footer');
		} else { redirect(base_url()); } 
	}
	public function view_gallerypics() {
		if($this->session->userdata('logged_in_admin')) {
			$data['gallery_pics'] = $this->Customer_model->getGalleryPics();
			
			$settings        = get_settings();
        	$header['title'] = $settings->title . " | View Gallerypics";
			$this->load->view('Templates/header',$header);
			$this->load->view('customer/view-gallerypic',$data);
			$this->load->view('Templates/footer');
		} else { redirect(base_url()); } 
	}
  public function view_idproof() {
		if($this->session->userdata('logged_in_admin')) {
			$data['proof'] = $this->Customer_model->getIdproofs();
			$settings        = get_settings();
        	$header['title'] = $settings->title . " | View Id Proof";
			$this->load->view('Templates/header',$header);
			$this->load->view('customer/view-idproofs',$data);
			$this->load->view('Templates/footer');
		} else { redirect(base_url()); } 
	}
	public function crop_profilepic() {
		if($this->session->userdata('logged_in_admin')) {
			if($_POST){
/*var_dump($_POST);
die();*/
				$data['prof_pic'] = $_POST['image-loc'];
				$data['prof_user'] = $_POST['image-user'];
				$data['prof_preference'] = $_POST['profile_preference'];
				$data['picid'] = $_POST['picid'];
				$settings        = get_settings();
        		$header['title'] = $settings->title . " | Crop Profile Pics";
				$this->load->view('Templates/header',$header);
				$this->load->view('customer/crop-profilepic',$data);
				$this->load->view('Templates/footer');
			}
		} else { redirect(base_url()); } 
	}

	public function save_croped() {
		if($this->session->userdata('logged_in_admin')) {
			if($_POST){
				$pic_id = $_POST['picid'];
				$new_name = $_POST['photo'];
				$prof_preference = $_POST['prof_preference'];

				$image_config["image_library"] = "gd2";
				$image_config["source_image"] = '../'.$_POST['photo'];

				$image_config['wm_text'] = 'solmate.com';
				$image_config['wm_type'] = 'text';
				$image_config['wm_font_path'] = './system/fonts/texb.ttf';
				$image_config['wm_font_size'] = '12';
				$image_config['wm_font_color'] = 'ffffff';
				$image_config['wm_vrt_alignment'] = 'bottom';
				$image_config['wm_hor_alignment'] = 'right';
				$image_config['wm_padding'] = '0';
				$image_config['wm_opacity']   = '48';

				$image_config['create_thumb'] = FALSE;
				$image_config['maintain_ratio'] = true;
				$image_config['new_image'] = '../'.$new_name;
				$image_config['width'] =$_POST['w'];
				$image_config['height'] =$_POST['h'];
				$image_config['x_axis'] = $_POST['x'];
				$image_config['y_axis'] = $_POST['y'];
				$dim = (intval($_POST["org_w"]) / intval($_POST["org_h"])) - ($_POST['w'] / $_POST['h']);
				$image_config['master_dim'] = ($dim > 0)? "height" : "width";
				/*var_dump($image_config);
				die();*/
                
				$this->load->library('image_lib');
				$this->image_lib->clear();
				$this->image_lib->initialize($image_config);
				
				if(!($this->image_lib->crop() && $this->image_lib->watermark())) { //Resize image
					
				    echo $this->image_lib->display_errors();
				    $this->session->set_flashdata('message', array('message' => "Something Went wrong.",'class' => 'danger'));
					redirect(base_url().'customer/view_profilepics');
				} else { 
					$ext = pathinfo($new_name, PATHINFO_EXTENSION);	
					if($ext=='jpg')	{			
					$img = imagecreatefromjpeg(base_url().'../'.$new_name); 
					for ($x=1; $x<=35; $x++) { 
					imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR); 
					imagefilter($img, IMG_FILTER_SELECTIVE_BLUR); 
					} 
					$image_name= time()."_".'blur'.'.jpg';	
					$image_name1='assets/uploads/profile_pics/'.$image_name;			
					imagejpeg($img,'../assets/uploads/profile_pics/'.$image_name); 
					imagedestroy($img); 
				    }else if($ext=='png'){

				    $img = imagecreatefrompng(base_url().'../'.$new_name); 
				    $image_name= time()."_".'blur'.'.png';			    
					$image_name1='assets/uploads/profile_pics/'.$image_name;
					for ($x=1; $x<=35; $x++) { 
					imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR); 
					imagefilter($img, IMG_FILTER_SELECTIVE_BLUR); 
					} 
					imagepng($img,'../assets/uploads/profile_pics/'.$image_name); 
					imagedestroy($img); 	
				    }/*if($prof_preference=='1'){*/
				    $this->Customer_model->update_profile_pic_blur($image_name1,$_POST['user_matr'],$pic_id);
				   /* }*/
					$this->Customer_model->update_profile_pic($new_name,$_POST['user_matr'],$pic_id);
					$this->session->set_flashdata('message',array('message' => ' Profile Picture Successfully Croped and Approved','class' => 'success'));
					redirect(base_url().'customer/view_profilepics');
				}
			}
		} else { redirect(base_url()); } 
	}
public function hello() { 
	$img = imagecreatefrompng('https://pbs.twimg.com/profile_images/616198230297214976/PeR519Mx.png'); 
	for ($x=1; $x<=35; $x++) { 
		imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR); 
		//imagefilter($img, IMG_FILTER_SELECTIVE_BLUR); 
	} 
		imagepng($img,'db-bw.png'); 
		imagedestroy($img); 
}
 // view profile pic	  
	public function view_profilepic(){
		  $template['page'] = 'customer/view-profilepic';
		  $template['title'] = 'View Customer';
		  $template['data'] = $this->Customer_model->view_profilepic();
		  $this->load->view('template',$template);
	  }
//approve profilepic  
	 function approve_profilepic(){
		  $data1 = array(
				  "profilepic_status" => '1'
							 );
		  $id = $this->uri->segment(3);		   
		  $result = $this->Customer_model->approve_profilepic($id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Approved Successfully','class' => 'success'));
		  redirect(base_url().'Customer/view_profilepics');
	  }
//reject profilepic	//set pic_staus==2  
	 function reject_profilepic(){
		  $data1 = array(
				  "pic_status" => '2'
							 );
		  $user_id = $this->uri->segment(3);
		  $pic_id = $this->uri->segment(4);		   
		  $result = $this->Customer_model->reject_profilepic($user_id,$pic_id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Rejected Successfully ','class' => 'error'));
		  redirect(base_url().'Customer/view_profilepics');
	  }
//delete profilepic	  
	 function delete_profilepic(){
		  $data1 = array(
				  "pic_status" => '3'
							 );
		  $user_id = $this->uri->segment(3);
		  $pic_id = $this->uri->segment(4);
		  //print_r($user_id);  print_r( $pic_id); die;			   
		  $result = $this->Customer_model->delete_profilepic($user_id,$pic_id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
		  redirect(base_url().'Customer/view_profilepics');
	  }
//approve gallerypic  
	 function approve_gallerypic(){ 
		  $data1 = array(
				  "pic_approval" => '1'
							 );
		  /*$user_id = $this->uri->segment(3);
		  $id = $this->uri->segment(4);	*/
		  if($_POST){
		  $data=$_POST;
		  $user_id = $data['image-user'];
		  $id=$data['picid'];
		  $img_loc=$data['image-loc'];
				    $ext = pathinfo($img_loc, PATHINFO_EXTENSION);	
					/*var_dump($img_loc);
					die();*/
						if($ext=='jpg')	{	
						$a=base_url().'../'.$img_loc;
						/*var_dump($a);
						die();		*/
					$img = imagecreatefromjpeg($a); 
					for ($x=1; $x<=35; $x++) { 
					imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR); 
					imagefilter($img, IMG_FILTER_SELECTIVE_BLUR); 
					} 
					$image_name= time()."_".'blur'.'.jpg';	
					$image_name1='assets/uploads/gallery/'.$image_name;			
				/*	imagejpeg($img,'../assets/uploads/gallery/'.$image_name); */
				     imagejpeg($img,'../assets/uploads/gallery/'.$image_name); 
					imagedestroy($img); 
				    }else if($ext=='png'){
						$a=base_url().'../'.$img_loc;
						/*var_dump($a);
						die();	*/
				    $img = imagecreatefrompng($a); 
				    $image_name= time()."_".'blur'.'.png';			    
					$image_name1='assets/uploads/gallery/'.$image_name;
					for ($x=1; $x<=35; $x++) { 
					imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR); 
					imagefilter($img, IMG_FILTER_SELECTIVE_BLUR); 
					} 
					/*imagepng($img,'assets/uploads/gallery/'.$image_name); */
					imagepng($img,'../assets/uploads/gallery/'.$image_name); 
					imagedestroy($img); 	
				    }
		  $result = $this->Customer_model->approve_gallerypic($user_id,$id,$data1,$image_name1);
		}
		  $this->session->set_flashdata('message', array('message' => 'Approved Successfully','class' => 'success'));
		  redirect(base_url().'Customer/view_gallerypics');
	  }
//reject gallerypic	  
	 function reject_gallerypic(){
		  
		  $data1 = array(
				  "pic_approval" => '0'
							 );
		  $user_id = $this->uri->segment(3);
		  $id = $this->uri->segment(4);	
		  // print_r($user_id);  print_r($user_id); die; 
		  $result = $this->Customer_model->reject_gallerypic($user_id,$id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Rejected Successfully','class' => 'error'));
		  redirect(base_url().'Customer/view_gallerypics');
	  }
//delete gallerypic	  
	 function delete_gallerypic(){
		  
		  $data1 = array(
				  "pict_status" => '0'
							 );
		  $user_id = $this->uri->segment(3);
		  $id = $this->uri->segment(4);			   
		  $result = $this->Customer_model->delete_gallerypic($user_id,$id,$data1);
		  $this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
		  redirect(base_url().'Customer/view_gallerypics');
	  }  
}	 
?>