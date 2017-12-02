<?php
$settings = get_setting();
$pid = $this->session->userdata('ins_id');
$sess = get_profile($pid);
 ?>
 <!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/starter-template/ -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo $settings->icon; ?>">

    <title><?php echo $settings->title; ?></title>

    <!-- GENERAL-CSS -->
    <link href="<?php echo base_url(); ?>assets/css/sliding-carousel.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" >
    <!-- for slick slider -->
    <link href="<?php echo base_url(); ?>assets/css/slick/slick.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/slick/slick-theme.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/cascade.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animations.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jquery.bxslider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animations.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/circle.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/parsley/parsley.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js ?>"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery-slidingCarousel.js" type="text/javascript"></script>
    <link href="<?php echo base_url(); ?>assets/css/intlTelInput.css" rel="stylesheet">

    <!-- For slick slider -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/css/slick/slick.min.js"></script>

    <style type="text/css">
      .wed-navbar-logo img {width: 90px;}
    </style>
    
  </head>
   <body>
   <?php
    function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
    } ?>
    <?php //if ($sess)  { ?>
    <nav class="navbar navbar-inverse navbar-fixed-top wed-navbar nav_bg">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand wed-navbar-logo" href="<?php echo base_url();?>">
                <img src="<?php echo $settings->logo; ?>">
              </a>
            </div>
          </div>
          <div class="col-md-9">
            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false">

			
			
			 <div class="row">
                <div class="col-md-12 col-xs-12">

                  <ul class="wed-navbar-list">
           
                      <li class="pull-right"><h4 style="font-family: 'Roboto', sans-serif;font-weight: 500;">Welcome <?php echo $sess->profile_name;?></h4></li>
                    <div class="clearfix"></div>
                  </ul>
                </div>
              </div>
             <!-- <ul class="wed-inside-menu">
                <div class="floatl">

                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown" <?php if ($this->uri->segment(1) == "profile") { ?> class="active_menu" <?php } ?> >My Home</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                          <li><a href="<?php echo base_url();?>profile/my_profile"> My Profile</a></li>
                          <li><a href="<?php echo base_url();?>profile/recent_profiles/me" >Who Viewed my Profile</a></li>
                          <li><a href="<?php echo base_url();?>profile/shortlisted_profiles/me" >Who Shortlisted Me</a></li>
                          <li><a href="<?php echo base_url();?>profile/interested_profiles/me" >Who Interested in Me</a></li>
                      </ul>
                  </div>
                </li>

                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown" <?php if ($this->uri->segment(1) == "search") { ?> class="active_menu" <?php } ?> >Search</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                       
                          <li><a href="<?php echo base_url();?>search/advanced?regular" >Regular Search</a></li>
                          <li><a href="<?php echo base_url();?>search/advanced?advanced" >Advanced Search</a></li>
                          <li><a href="<?php echo base_url();?>search/advanced?keyword">Keyword Search</a></li>
                       
						              <li><a data-toggle="modal" data-target="#saved">Saved Search</a></li>
                      </ul>
                  </div>
                </li>

                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown">Matches</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                          <li><a href="<?php echo base_url();?>search" >My Matches</a></li>
                          <li><a href="<?php echo base_url();?>profile/shortlisted_profiles/my" >Shortlisted Profiles</a></li>
                          <li><a href="<?php echo base_url();?>profile/interested_profiles/my">Interested Profiles</a></li>
                      </ul>
                  </div>
                </li>

                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown">Messages</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                          <li><a href="<?php echo base_url();?>profile/inbox?inbox">Inbox</a></li>
						              <li><a href="<?php echo base_url();?>profile/inbox?send">Sent</a></li>
                          <li><a href="<?php echo base_url();?>profile/inbox?trash">Trash</a></li>
                      </ul>
                  </div>
                </li>


                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown">Upgrade</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                          <li><a href="<?php echo base_url();?>package" >Payment Options</a></li>
                          <li><a href="<?php echo base_url();?>Profile/membershipinfo" >Membership Info</a></li>
                      </ul>
                  </div>
                </li>

                <li>
                  <div class="dropdown">
                    <div class=" dropdown-toggle" data-toggle="dropdown">Help</div>
                      <ul class="dropdown-menu wed-nav-dd-menu animated flipInX">
                          <li><a href="<?php echo base_url();?>home/contact" >Contact Us</a></li>
                      </ul>
                  </div>
                </li>
                </div>

                <!-- MY-ACCOUNT-DROP-DOWN -->
              <?php 
              $this->db->where('matrimony_id',$sess->matrimony_id);
              $query = $this->db->get('profiles');
              $is_premium = $query->row();

              $uid = $is_premium->user_id;
              $this->db->where('user_id',$uid);
              $this->db->where('pic_status',1);
              $this->db->order_by('pic_verification_id', 'desc'); 
              $query1 = $this->db->get('profile_pic_verification');
              $pic_approve = $query1->row();
              
              ?>

               <!-- <div class="floatr wed-admin-menu">
                    <li><span class="search_noti">
					<img src="<?php echo base_url(); ?>assets/img/notification.png" data-toggle="modal" data-target="#notification" class="notification_count">
                     
                    </span>
					<?php $s = get_notificationcount($sess->matrimony_id); 
					
					if($s > 0){
					?>
                    <div class="bell_noti"><?php echo $s;?></div>
					<?php } ?>
                  </li>
                    <li>
                    <div class="wed-profile" >
                     <?php if($pic_approve=="") {?>
                        <img src="<?php echo base_url(); ?>assets/img/user.jpg" data-toggle="modal" data-target="#drop">    
                      <?php } 
                      else { ?>
                        <img src="<?php echo base_url().$pic_approve->pic_location; ?>" data-toggle="modal" data-target="#drop">
                    <?php } ?>
                    </div>
                    </li>
                    <li><span class="arrow" data-toggle="modal" data-target="#drop"><img src="<?php echo base_url(); ?>assets/img/arrow.png"></span></li>
                </div>

              
              

              <div id="drop" class="modal wed-drop-modal fade" role="dialog">
                <div class="modal-dialog wed-drop-modal-dialog animated fadeInDown">
                    <div class="modal-content wed-modal-content">
                      <div class="modal-body wed-modal-body">
                        <div class="wed-modal-head">
                          <div class="wed-arrow-up"></div>
                          <h5><?php echo $sess->profile_name; ?></h5>
                          <p><?php echo $settings->id_prefix;?><?php echo $sess->matrimony_id; ?></p>
                          <hr>
                          <div class="wed-acnt">
                            <?php if($is_premium->is_premium==0){?>
                            <li style="width:60%;padding-top: 4px;">Account Type : Free</li>
                            <?php }else{ ?>
                             <li style="width:60%;padding-top: 4px;">Account Type : Premium</li>
                             <?php } ?>
                            <li style="width:40%;"><a href="<?php echo base_url();?>package"><button class="wed-upgrade">Upgrade</button></a></li>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <div class="wed-modal-list">
                          <li><a href="<?php echo base_url();?>profile/my_profile">Edit Profile</a></li>
                          <li data-toggle="collapse" data-target="#photo">Upload Photo</li>
                            <div id="photo" class="collapse">
                              <li><a href="<?php echo base_url();?>profile/upload_profile_pic" style="color:#d12d4c;font-weight:500;">- Add a Profile Photo</a></li>
                              <li><a href="<?php echo base_url();?>profile/upload_multi_image" style="color:#d12d4c;font-weight:500;">- Add a Gallery Photo</a></li>
                            </div>
                          <li><a href="<?php echo base_url();?>profile/partner_preference">Edit Partner Preference</a></li>
                          <li><a href="<?php echo base_url();?>profile/upload_badge">Add Trust Badge</a></li>
                          <li><a href="<?php echo base_url();?>settings">Settings</a></li>
                          <li><a href="#">Feedback</a></li>
                          <li><a href="<?php echo base_url();?>home/logout">Logout</a></li>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <!-- NOTIFICATION-DROP-DOWN -->

              <?php
              $ci =&get_instance();
              $ci->load->model('Profile_model','pm',TRUE);
              $history = $ci->pm->getMyHistory1();
             ?>

             <!-- <div id="notification" class="modal wed-drop-modal fade" role="dialog">
                <div class="modal-dialog wed-drop-modal-dialog animated fadeInDown">
                    <div class="modal-content wed-modal-content">
                      <div class="modal-body wed-notification-modal-body">
                          <div class="wed-arrow-up"></div>

                        <div class="wed-modal-list">
                          <div class="wed-noticationlist">
                            <h4>Notifications</h4>
                            <?php if(!empty($history)) { foreach($history as $hist) {  
                              if($hist->history_type == "INTEREST_SENT") { $hist_type= "interest"; }
                              else if($hist->history_type == "MESSAGE_SENT") { $hist_type="message"; }
                              else { $hist_type="photo request"; }
                              $msg = "<b>".$hist->profile_name."</b> has sent you a ".$hist_type;  ?>
                            <div style="border-bottom: 1px solid #ededed;">
                              <a href="<?php echo base_url(); ?>Profile/inbox"><p><?php echo  $msg ?></p></a>
                              <span><?php echo time_elapsed_string($hist->history_datetime);?></span>
                            </div>
                            <?php } } ?>
                          </div>

                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="clearfix"></div>
              </ul>-->
            </div>
          </div>
        </div>
      </div>
    </nav>
 
 <!--header-->
 
    <div class="wed-reg-top-banner">
      <div class="container container-custom">
        <div class="row">
          <div class="col-md-3">
            <div class="wed-reg-tick">
              <img src="<?php echo base_url(); ?>assets/img/tick-reg.png">
            </div>
          </div>
          <div class="col-md-9">
            <div class="wed-reg-banner-detail">
              <p>You have <strong>1800</strong> </p>
              <p>Matching Profiles based on your details</p>
              <p>Completing this page will take you closer to your perfect match</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- REGESTRATION-REGISTRATION-DETAILS -->

    <div class="wed-reg-details">
      <div class="container container-custom">

	  

        <div class="row">
          <div class="col-md-9">
            <div class="wed-reg-right">
              <h1>PERSONAL INFORMATION</h1>
			       <div class="wed-reg-div1">
              <h6>Personal Details</h6>
              <hr>
              <ul>
                <form method="post" action="" id="reg_detail_form">
                <li>
                  <div class="wed-reg-right-child1">Maritial Status</div>
                  <div class="wed-reg-right-child2">
                    <div class="wed-custom5">
                        <input id="nm" type="radio" name="maritial_status" checked="checked" value="1" required>
                        <label for="nm">Never Married</label>
                        <input id="dvsd" type="radio" name="maritial_status" value="2">
                        <label for="dvsd">Divorced</label>
                        <input id="wd" type="radio" name="maritial_status" value="3">
                        <label for="wd">Widowed</label>
                        <input id="advsd" type="radio" name="maritial_status" value="4">
                        <label for="advsd">Awaiting for Divorce</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Willing to Marry from the other Communities.?</div>
                  <div class="wed-reg-right-child2">
                    <div class="wed-custom5">
                      <div class="row1">
                        <input id="nm1" type="radio" checked="checked" name="willing" value="1" required>
                        <label for="nm1">Yes</label>
                        <input id="dvsd1" type="radio" name="willing" value="2">
                        <label for="dvsd1">No</label>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">Sub Caste</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <span><input class="wed-reg-input12 reg_input" type="text" name="sub_caste"></span>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
				</ul>
				</div>
				<div class="wed-reg-div1">
              <h6>Groom’s Location Details</h6>
              <hr>
              <ul>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">Country Living In</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select cst-select-1 cst-select-2" name="country" cst-attr="country" cst-for="state" id="country-selector">
                          <option value="0">Select</option>
                          <?php foreach($countries as $country) { ?>
                              <option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">State Living In</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select cst-select-1" name="state" cst-attr="state" cst-for="city" id="state-selector">
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">City Living In</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select cst-select-1" name="city" cst-attr="city" cst-for="" id="city-selector">
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
              </ul>
			  </div>
			  <div class="wed-reg-div1">
              <h6>Physical Attributes</h6>
              <hr>
              <ul>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">Height</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <span><select class="wed-reg-select1 reg_input" name="feet" id="height">
                          <option value="0"> Cms - Feet/inches </option>
                          <?php foreach($heights as $hgt) { ?>
                              <option value="<?php echo $hgt->height_id; ?>"><?php echo $hgt->height; ?></option>
                          <?php } ?>
                        </select></span>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">Weight</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <span><select class="wed-reg-select1 reg_input" name="weight" id="weight">
                          <option value="0"> - Kgs -</option>
                          <?php foreach($weights as $wgt) { ?>
                              <option value="<?php echo $wgt->weight_id; ?>"><?php echo $wgt->weight; ?></option>
                          <?php } ?>
                        </select></span>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Body Type</div>
                  <div class="wed-reg-right-child2">
                    <div class="wed-custom5">
                        <input id="slim" type="radio" name="body_type" checked="checked" value="1" required>
                        <label for="slim">Slim</label>
                        <input id="avg" type="radio" name="body_type" value="2">
                        <label for="avg">Average</label>
                        <input id="ath" type="radio" name="body_type" value="3">
                        <label for="ath">Athletic</label>
                        <input id="hvy" type="radio" name="body_type" value="4">
                        <label for="hvy">Heavy</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Complexion</div>
                  <div class="wed-reg-right-child2">
                    <div class="wed-custom5">
                        <input id="vf" type="radio" name="complexion" checked="checked" value="1" required>
                        <label for="vf">Very Fair</label>
                        <input id="fair" type="radio" name="complexion" value="2">
                        <label for="fair">Fair</label>
                        <input id="wht" type="radio" name="complexion" value="3">
                        <label for="wht">Wheatish</label>
                        <input id="whtb" type="radio" name="complexion" value="4">
                        <label for="whtb">Wheatish Brown</label>
                        <input id="dsrk" type="radio" name="complexion" value="5">
                        <label for="dark">Dark</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Physical Status</div>
                  <div class="wed-reg-right-child2">
                    <div class="wed-custom5">
                        <input id="nor" type="radio" name="physical_status" checked="checked" value="1" required>
                        <label for="nor">Normal</label>
                        <input id="phy" type="radio" name="physical_status" value="2">
                        <label for="phy">Physically Challenged</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
              </ul>
			  </div>
			  <div class="wed-reg-div1">
              <h6>Education and Occupation</h6>
              <hr>
              <ul>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">Highest Education</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select" name="education" id="education" required>
                          <option value="0">Select</option>
                          <?php foreach($educations as $education) { ?>
                              <option value='<?php echo $education->education_id; ?>'><?php echo $education->education; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1 paddingtop10">Occupation</div>
                  <div class="wed-reg-right-child2">
                      <div class="row1">
                        <select class="wed-reg-select" name="occupation" id="occupation" required>
                          <option value="0">Select Occupation</option>
                          <?php foreach($occupations as $occupat) { ?>
                              <option value="<?php echo $occupat->occupation_id; ?>"><?php echo $occupat->occupation; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Employed In</div>
                  <div class="wed-reg-right-child2">
                    <div class="wed-custom5">
                        <input id="gov" type="radio" name="employed_in" checked="checked" value="1" required>
                        <label for="gov">Government</label>
                        <input id="prvt" type="radio" name="employed_in" value="2">
                        <label for="prvt">Private</label>
                        <input id="bus" type="radio" name="employed_in" value="3">
                        <label for="bus">Business</label>
                        <input id="self" type="radio" name="employed_in" value="4">
                        <label for="self">Self Employed</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Income</div>
                  <div class="wed-reg-right-child2">
                    <div class="row1">
                      <span><select class="wed-reg-select1 cst-select-1" cst-attr="currency" cst-for="city" id="currency-selector" name="country_currency">
                        
                      </select></span>
                      <span><input class="wed-reg-input12" type="text" name="income" required></span>
                      <div class="row1">
                        <div class="wed-custom5">
                         <input id="mon" type="radio" name="income_per"  value="1" required>
                         <label for="mon">Per Month</label>
                         <input id="yr" type="radio" name="income_per" value="2" checked="checked">
                         <label for="yr">Per Year</label>                        
                       </div>
                      </div>

                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
              </ul>
			  </div>
			  <div class="wed-reg-div1">
              <h6>Habits</h6>
              <hr>
              <ul>
                <li>
                  <div class="wed-reg-right-child1">Food</div>
                  <div class="wed-reg-right-child2">
                    <div class="wed-custom5">
                        <input id="veg" type="radio" name="food" checked="checked" value="1" required>
                        <label for="veg">Vegetarian</label>
                        <input id="nveg" type="radio" name="food" value="2">
                        <label for="nveg">Non Vegitarian</label>
                        <input id="egg" type="radio" name="food" value="3">
                        <label for="egg">Eggetarian</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Smoking</div>
                  <div class="wed-reg-right-child2">
                    <div class="wed-custom5">
                        <input id="no" type="radio" name="smoking" checked="checked" value="1" required>
                        <label for="no">No</label>
                        <input id="occ" type="radio" name="smoking" value="2">
                        <label for="occ">Occasionaly</label>
                        <input id="ys" type="radio" name="smoking" value="3">
                        <label for="ys">Yes</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Drinking</div>
                  <div class="wed-reg-right-child2">
                    <div class="wed-custom5">
                        <input id="nop" type="radio" name="drinking" checked="checked" value="1" required>
                        <label for="nop">No</label>
                        <input id="ds" type="radio" name="drinking" value="2">
                        <label for="ds">Drinks Socialy</label>
                        <input id="yp" type="radio" name="drinking" value="3"> 
                        <label for="yp">Yes</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
              </ul>
			  </div>
              <!-- <h6>Astrological Info</h6>
              <hr> -->
              <ul style="display: none;">
                <li><p>You may not believe in Horoscope matching, yet we recomment that you fill in your astro Details
                   as a lot of Members would be interested in there details</p></li>
                   <li>
                     <div class="wed-reg-right-child1">Have Dosham?</div>
                     <div class="wed-reg-right-child2">
                       <div class="wed-custom5">
                           <input id="nm12" type="radio" name="dosham" value="1">
                           <label for="nm12">No</label>
                           <input id="dvsd12" type="radio" name="dosham" value="2">
                           <label for="dvsd12">Yes</label>
                           <input id="wd45" type="radio" name="dosham" value="3">
                           <label for="wd45">Don't Know</label>
                       </div>
                     </div>
                     <div class="clearfix"></div>
                   </li>
                   <li>
                     <div class="wed-reg-right-child1 paddingtop10">Star</div>
                     <div class="wed-reg-right-child2">
                         <div class="row1">
                           <select class="wed-reg-select" name="star">
                              <option value="0">Option</option>
                              <?php foreach($stars as $star) { ?>
                                  <option value="<?php echo $star->star_id; ?>"><?php echo $star->star_name; ?></option>
                              <?php } ?>                  
                           </select>
                         </div>
                       </div>
                     <div class="clearfix"></div>
                   </li>
                   <li>
                     <div class="wed-reg-right-child1 paddingtop10">Raasi /Moon Sign</div>
                     <div class="wed-reg-right-child2">
                         <div class="row1">
                           <select class="wed-reg-select" name="raasi">
                             <option value="0">Option</option>
                             <?php foreach($raasi as $raas) { ?>
                                  <option value="<?php echo $raas->raasi_id; ?>"><?php echo $raas->raasi_name; ?></option>
                              <?php } ?>
                           </select>
                         </div>
                       </div>
                     <div class="clearfix"></div>
                   </li>
              </ul>
			  <div class="wed-reg-div1">
              <h6>Family Profile</h6>
              <hr>
              <ul>
                <li>
                  <div class="wed-reg-right-child1">Family Status</div>
                  <div class="wed-reg-right-child2">
                    <div class="wed-custom5">
                        <input id="mid" type="radio" name="family_status" checked="checked" value="1" required>
                        <label for="mid">Middle Class</label>
                        <input id="up" type="radio" name="family_status" value="2">
                        <label for="up">Upper Middile Class</label>
                        <input id="rch" type="radio" name="family_status" value="3">
                        <label for="rch">Rich</label>
                        <input id="affl" type="radio" name="family_status" value="4">
                        <label for="affl">Affluent</label>
                        
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Family Type</div>
                  <div class="wed-reg-right-child2">
                    <div class="wed-custom5">
                        <input id="jo" type="radio" name="family_type" checked="checked" value="1" required>
                        <label for="jo">Joint</label>
                        <input id="nuc" type="radio" name="family_type" value="2">
                        <label for="nuc"> Nuclear</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <li>
                  <div class="wed-reg-right-child1">Family Value</div>
                  <div class="wed-reg-right-child2">
                    <div class="wed-custom5">
                        <input id="ort" type="radio" name="family_value" checked="checked" value="1" required>
                        <label for="ort">Orthodox</label>

                        <input id="trad" type="radio" name="family_value" value="2">
                        <label for="trad">Traditional</label>

                        <input id="mod" type="radio" name="family_value" value="3">
                        <label for="mod">Moderate</label>

                        <input id="lib" type="radio" name="family_value" value="4">
                        <label for="lib">Liberal</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </li>
              </ul>
			  </div>
			  <div class="wed-reg-div1">
              <h6>Something About You</h6>
              <hr>
              <ul>
                <li>
                  <p>Write about your Personality, Family Background, Education, Proffession and Hobbies</p>
                  <textarea class="wed-reg-textarea"  rows="4" cols="50" name="about_you"></textarea>
                  <p>( Min. 50 Characters )</p>
                </li>
                <li>

                  <!-- ============Showing Error Message================== -->
                  <div id="error-msg"></div>
                  <!-- ============Showing Error Message================== -->
                  <a href="#" class="wed-scrollup">
  					         <button class="wed-submit-btn1 reg_detail" type="button">Submit</button>
  				        </a>

                </li>

              </form>
              </ul>
			  </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="wed-reg-right-ads">
              <ul>
                <li>
                  <img src="<?php echo base_url(); ?>assets/img/mobile.png">
                  <p>Mobile Verified</p>
                </li>
                <li>
                  <img src="<?php echo base_url(); ?>assets/img/happy.png">
                  <p>Millions of<br>
                    Happy Marriages</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>






    <!-- GENERAL-JAVASCRIPT -->


    <script src="js/ie-emulation-modes-warning.js.download"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script>
$( document ).ready(function() {

    $(".cst-select-1").on('change', function () {
        var valueSelected = $(this).val();
        var select_type   = $(this).attr('cst-attr');
        var select_destn  = $(this).attr('cst-for');
        var passdata_2 = 'sel_val='+ valueSelected +'&sel_typ='+select_type;

        $.ajax({
        type: "POST",
        url : '<?php echo base_url(); ?>home/get_drop_data',
        data:  passdata_2,
        success: function(data){
               $("#"+select_destn+"-selector").html(data);
            }
        });
    });


    $(".cst-select-2").on('change', function () {
          var valueSelected = $(this).val();
          var select_type   = 'country';
          var passdata_2 = 'sel_val='+ valueSelected +'&sel_typ='+select_type;

          $.ajax({
            type: "POST",
            url : '<?php echo base_url(); ?>home/get_drop_data1',
            data:  passdata_2,
            success: function(data){
             $("#currency-selector").html(data);
           }
         });
        }); 

    $(".reg_detail").click(function(){
        //if($('#sub_caste').val() == 0) { alert('Sub caste can not be empty'); return false; }
        if($('#country-selector').val() == 0) { 
          $("#error-msg").show();
          $("#error-msg").html('<p class="alert alert-danger" id="top">Country cannot be empty</p>');
          setTimeout(function() { $("#error-msg").hide();}, 3000)
          return false; 

        } else if($('#state-selector').val() == 0) {
          // $('#error-msg').html('State cannot be empty'); 
          // $('.error-alert').show();
          // return false;
          $("#error-msg").show();
          $("#error-msg").html('<p class="alert alert-danger" id="top">State cannot be empty</p>');
          setTimeout(function() { $("#error-msg").hide();}, 3000)
          return false; 
        } else if($('#city-selector').val() == 0) { 
          $("#error-msg").show();
          $("#error-msg").html('<p class="alert alert-danger" id="top">City cannot be empty</p>');
          setTimeout(function() { $("#error-msg").hide();}, 3000)
          return false;
        }
        //else if($('#height').val() == 0) { alert('Height can not be empty'); return false; }
        //else if($('#weight').val() == 0) { alert('Weight can not be empty'); return false; }
        else if($('#education').val() == 0) { 
          $("#error-msg").show();
          $("#error-msg").html('<p class="alert alert-danger" id="top">Education cannot be empty</p>');
          setTimeout(function() { $("#error-msg").hide();}, 3000)
          return false;
        } else if($('#occupation').val() == 0) { 
          $("#error-msg").show();
          $("#error-msg").html('<p class="alert alert-danger" id="top">Occupation Living can not be empty</p>');
          setTimeout(function() { $("#error-msg").hide();}, 3000)
          return false; 
        }
        else { }
   // if($('#reg_detail_form').parsley().validate()){

      var value =$("#reg_detail_form").serialize();
      var info = <?php echo json_encode($this->session->userdata('email')); ?>;
      var email_id = info;
     

          $.ajax({
          type: "POST",
          url: base_url+'home/submit_registration_details',
          data: value,
          error: function (err) {
              console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
          },
          success: function(data){
            data = JSON.parse(data);
              if(data==1){
                  $.post(base_url+"Verify/send_otp", { email_id: email_id }, function(data) { });
                  window.location.href= base_url+"Verify/";       
              }
          }
      });
   //} 
});

});
</script>