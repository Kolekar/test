<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Verify_model');
        date_default_timezone_set('Asia/Kolkata');
        $session=$this->session->userdata('logged_in');  
	       if (!isset($session)&& empty($session) )  { 
				redirect(base_url());
			}
    }

	
	public function index($err = NULL)
	{        
	 			$my_matr_id = $this->session->userdata('logged_in');
	    		$header['title'] = "Verify | TCM".$my_matr_id->matrimony_id;
	            $this->load->view('header', $header);
	            if($err == NULL) { $data['error'] = ""; } else { $data['error'] = "Incorrect OTP"; } 
	            //$template['data'] = $this->Verify_model->view_packages();
				$this->load->view('verify',$data);
				$this->load->view('footer');                
	}
	public function view_package()
	{         //  $my_matr_id = $this->session->userdata('logged_in');
	    	   $data = $_POST;
	    	   $result = $this->Package_model->view_package($data);
	    	   print json_encode($result);                
	}

/*	public function send_sms($email_id,$message) {  
        $this->load->library('email');
        $settings = mail_otp();
        $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => $settings->smtp_host,
                'smtp_port' => 587,
                'smtp_user' => $settings->smtp_username, // change it to yours
                'smtp_pass' => $settings->smtp_password, // change it to yours
               );
        $this->email->initialize($config);// add this line
        $subject = 'OTP Verification';
        $name= 'Solmate';
        $mailTemplate=$message;
        $this->email->from($settings->admin_email, $name);
        $this->email->to($email_id);
        $this->email->subject($subject);
        $this->email->message($mailTemplate);  
        $this->email->send();
    }*/
    
    
   public function send_sms($email_id,$message) {  
        // $data = '{"name":"Adarsh","email":"adarsh.techware@gmail.com","message" :"Hi Team"}';

        //$data = json_decode($data);

        //$email_id = 'adarsh.techware@gmail.com';
        //$message = 'Test mail';
        $settings = get_setting();
        $this->load->library('email');

  $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => $settings->smtp_host,
                'smtp_port' => 587,
                'smtp_user' =>  $settings->smtp_username, // change it to yours
                'smtp_pass' => $settings->smtp_password, // change it to yours
                'smtp_timeout'=>20,
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
               );



         $this->email->initialize($config);// add this line

      $subject = 'OTP Verification';
      $name= 'Solmate';
      $mailTemplate = $message;

        //$this->email->set_newline("\r\n");
        $this->email->from('no-reply@techlabz.in', $name);
        $this->email->to($email_id);
        $this->email->subject($subject);
        $this->email->message($mailTemplate);  
        echo $this->email->send();
        $rs = $this->email->print_debugger();
    }


    public function send_otp() {
      if($_POST['email_id']) { $email_id =  $_POST['email_id']; }
      $otp = $this->generate_otp();
      $result = $this->Verify_model->add_otpdetails($otp);
      $msg = "Hello, Your one time password for www.solmate.in is ".$otp." . Do not share the password with anyone for security reasons.";
      $this->send_sms($email_id,$msg);
    }

    public function resend_otp() {
      $my_matr_id = $this->session->userdata('logged_in');
	    $mob=$my_matr_id->email;
      
      $result = $this->Verify_model->get_otpdetails();
      $otp = $result->otp;
      $msg = "Hello, Your one time password for www.solmate.com is ".$otp." . Do not share the password with anyone for security reasons.";
      $this->send_sms($mob,$msg);
      redirect(base_url().'Verify'); 	
    }
 public function reg_success() {
      $my_matr_id = $this->session->userdata('logged_in');
	    $mob=$my_matr_id->phone;
      $msg = "You are Succesfully registered with www.solmate.com";
      $this->send_sms($mob,$msg);
 /*     redirect(base_url().'Verify/'); */	
    }
 public function intrest_success() {
    $my_matr_id = $this->session->userdata('logged_in');
	  $matri_id =  $_POST['matri_id'];
    $result=$this->Verify_model->get_mob($matri_id);
    $mobn=$result->phone;  
	  $mat_id=$my_matr_id->matrimony_id;
      $msg = "You Have Received An Intrest From TCM".$mat_id." login to www.solmate.com to see complete profile ";
      $this->send_sms($mobn,$msg);
 /*     redirect(base_url().'Verify/'); */	
    }  

   public function sms_send_success() {
    $my_matr_id = $this->session->userdata('logged_in');
    $phone=$my_matr_id->phone;
    $data=$_POST;
    //$matri_id =  $_POST['matri_id'];
   // $result=$this->Verify_model->get_mob($matri_id);
   // $result = $this->Verify_model->add_otpdetails($otp);
    $mobn=$data['mob_num']; 
    $mail_from=$data['mail_from']; 
    $msg=$data['mail_content'];
    $mat_id=$my_matr_id->matrimony_id;
        //$msg = "I am  ".$mail_from." TCM".$mat_id." from solmate.com ph: ".$phone." i would like to reach out to you.please share your contact details ";
     // 
      $result = $this->Verify_model->add_smsdetails($data);
       $send_sms_to=$data['to_id'];
       $this->send_sms($mobn,$msg);
        $this->session->set_flashdata('message',array('message' => 'SMS Sent Successfully','class' => 'success'));
      redirect(base_url().'Profile/profile_details/'.$send_sms_to.'');    
    }   
    public function generate_otp() {
      $uniq = mt_rand(100000, 999999);
      return $uniq;
    }
   public function check_otp() {
      
      $data = $_POST;
      $result = $this->Verify_model->check_otp($data);
     if($result=='1'){
     	  $this->reg_success();
        //$this->reg_success_mail();
     	  redirect(base_url().'Profile/upload_profile_pic'); 		
     	}else{
     		redirect(base_url().'Verify/index/error'); 	
     	}
     
     
    }
public function update_account($data){

$result = $this->Verify_model->update_account($data);
 /* var_dump($data);
  die();*/
 
}
/*public function verify_account(){


   $email_unique = $this->uri->segment(3);
   $email = $this->uri->segment(4);
   var_dump($email_unique);
   die();
}*/
  function sending_mail($from,$name,$mail,$sub, $msg) { 
// $ci =& get_instance(); 
// $finresult = get_settings_details(1); 
 $config['protocol'] = 'smtp';
 $config['smtp_host'] = 'smtp.techlabz.in'; 
 $config['smtp_user'] = 'no-reply@techlabz.in'; 
 $config['smtp_pass'] = 'baAEanx7'; 
 $config['smtp_port'] = 25; 
 $config['mailtype'] = 'html'; 
 $this->email->initialize($config); 
 $this->email->from($from, $name); 
 $this->email->to($mail); 
 $this->email->subject($sub);
  $this->email->message($msg); 
  $this->email->send(); //echo $this->email->print_debugger(); 
}   
  public function reg_success_mail() {
    $settings        = get_setting();
    $title           = $settings->title;

   $my_matr_id = $this->session->userdata('logged_in');
   $mat_id=$my_matr_id->matrimony_id; 
   $user_id=$my_matr_id->user_id; 
   $random = substr(number_format(time() * mt_rand(),0,'',''),0,10);
   $ran=md5($random);
   $data['email_unique']=$ran;
   $data['user_id']=$user_id;
   $this->update_account($data);
   $from= 'no-reply@techlabz.in'; 
   $name='telugumatrimony'; 
   $sub="Fwd: Your profile is successfully created on Soulmate Matrimony. Get started with your partner search!";
   $email=$my_matr_id->email; 
   $ma=base64_encode($email);
   $profile_name=$my_matr_id->profile_name;
   $mat_id=$my_matr_id->matrimony_id;
  // $template['data']=$data; 
      $mailTemplate=' <div class="email-temp-wrapper" style="width:800px;margin:0 auto;border:1px solid #c02c48;border-radius:5px;    padding: 10px;">
      <div class="email-temp-logo-div">
      <img src="http://192.168.138.31/TRAINEES/reshma/solmate/admin/assets/uploads/logo/soul_logo.png" style="width:120px;">
      </div>
      
      <div class="email-temp-content" style="border:1px solid #c02c48;border-radius:3px;border-top-left-radius:20px;border-top-right-radius:5px;
border-bottom-left-radius:5px;border-bottom-right-radius:20px;font-family: "Roboto", sans-serif;padding: 25px;">
        <strong style="font-style:italic;">Hi '.$profile_name.'</strong><br>
        <p style="color: #4d4d4d;"> You have successfully completed registration on solmate.com, </p>
        <p style="color: #4d4d4d;">To start browsing through profiles, please log in with your Matri ID TCM'.$mat_id.'. Please note that you can also use the registered mobile number to log in to your account.</p>
        <br>
<a href="182.74.149.58/Akhil/Wedding_web_akhil/Verify_mail/verify_account/'.$ran.'/'.$ma.'">Click  here to verify your account >></a>
          <div style="clear:both;"></div>
        </div>
      
   
        </div>
 ';

    $this->sending_mail($from,$name,$email,$sub,$mailTemplate);

      $this->session->set_flashdata('message',array('message' => 'Mail Sent Successfully','class' => 'success'));
               
  
    //echo "<script type='text/javascript'>alert('success!')</script>";
   // redirect(base_url().'profile/profile_details/'.$forward_id.''); 

   // header('Location: '.$url.''); 




}    
}
