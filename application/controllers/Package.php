<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('paypal_lib');
        $this->load->model('Package_model');
		
        date_default_timezone_set('Asia/Kolkata');
        $session=$this->session->userdata('logged_in');  
	       if (!isset($session)&& empty($session) )  { 
				redirect(base_url());
			}
    }

	
	public function index()
	{          $my_matr_id = $this->session->userdata('logged_in');
	    		$header['title'] = "Packages | TCM";
	            $this->load->view('header', $header);
	            $template['data'] = $this->Package_model->view_packages();
				$this->load->view('packages',$template);
				$this->load->view('footer');                  
	}
	public function view_package()
	{          $my_matr_id = $this->session->userdata('logged_in');
	    	   $data = $_POST;
	    	   $result = $this->Package_model->view_package($data);
	    	   print json_encode($result);                
	}
	
	
	
	
	
	public function paypal(){
		$data = http_build_query($_GET);
		$session=$this->session->userdata('logged_in');  
		$id=$this->input->get('amount');
		$amt = $this->Package_model->get_amount($id);
		$amount = $amt->price>0?$amt->price:250;
		$booking_id = 'SM'.strtotime(date('m/d/Y H:i:s'));
		$returnURL = base_url().'Package/success/?'.$id;
        $cancelURL = base_url().'Package/cancel';
        $notifyURL = base_url().'Package/success';
        $paypalID = $this->config->item('business');
        $this->paypal_lib->add_field('business', $paypalID);
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', "Solmate");
        $this->paypal_lib->add_field('custom', "BookedId");
        $this->paypal_lib->add_field('item_number',$id);
        $this->paypal_lib->add_field('amount',$amount);
		$this->paypal_lib->add_field('booking_id',$booking_id);
        $this->paypal_lib->paypal_auto_form();
	}
	function success(){
		
		$paypalInfo	= $this->input->post();
		$paypalURL = $this->paypal_lib->paypal_url;		
		$result	= $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
		$user = $this->Package_model->get_account();
		
		$booking_id = 'SM'.strtotime(date('m/d/Y H:i:s'));
			$booking_array = array('user_id'=>$user->matrimony_id,
								   'booking_id'=>$booking_id,
								   'package_id'=>$paypalInfo["item_number"],
								   'status'=>'Completed',
								   'purchase_amount'=>$paypalInfo["payment_gross"],
								   'payment_method'=>'Paypal',
								   'txnid'=>$paypalInfo["txn_id"],
								   'purchase_date'=>date('Y-m-d H:i:s')
								   );
			$this->db->insert('payments',$booking_array);
			$this->Package_model->upgrade_members($paypalInfo["item_number"]);
			$amt = $this->Package_model->get_amount($paypalInfo["item_number"]);
			$payment['package'] = $amt;
			$payment['user'] = $user;
			$payment['booked'] = $booking_array;
			$this->load->view('header');
		$this->load->view('paypal_payment',$payment);
		$this->load->view('footer');
    }
	
	 function cancel(){
    	redirect(base_url());
    }
	
	   public function payment_success($id=null){
		
		if($this->session->userdata('user_values')){ 	
	 	
		 	$uname=$this->session->userdata('user_values');
	    	$template['page_title'] = "Payment Success";
			$template['page_name'] = "success";
			$template['book_info'] = $this->db->where('id',$id)->get('payments')->row();
			$query1 = $this->db->query("select * from profiles where email ='$uname'");
				if ($query1->num_rows() =='1'){
					$row3 = $query1->row('profiles');
					$name=$row3->username;
					$from=$row3->username;
					$email=$row3->email;
					$sub='Booking Confirmation';
					$sms='Booking has been successful';
					$this->send_mail();
				}
		$this->load->view('template', $template);
		}else{
			redirect('/', 'refresh');
		}
    }
	function send_mail(){
        $ci = get_instance();
        $this->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.googlemail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "mail.techware@gmail.com"; 
        $config['smtp_pass'] = "Golden_123";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $this->email->initialize($config);

        $this->email->from('mail.techware@gmail.com', 'Techware');
        $list = array('adarsh.techware@gmail.com');
        $this->email->to($list);
        $this->email->reply_to('mail.techware@gmail.com', 'Techware');
        $this->email->subject('This is an email test');
        $this->email->message('It is working. Great!');
        $this->email->send();
    }
	
	function cash()
	{
		$result = $this->Package_model->upgrade_prem();
		if($result){
			$result1 = array('status'  => 'success','message'  => 'success');
		}
		//redirect(base_url('Package')); 
		print json_encode($result1);
	}
	
	
	
	
	
	
	
	
}
