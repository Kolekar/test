<link href = "<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel = "stylesheet">

    <!-- BANNER -->
    
    <div class="wed-banner" style="background:url('<?php echo base_url(); ?>admin/<?php echo $banner->banner_image;?>');">
      <!-- <div class="wed-banner" style="background:url('<?php echo base_url(); ?>admin/assets/img/home_main_bg.png');"> -->
      
      <!-- <div class="container container-custom"> -->
        <div class="row">
            <form method="post" id="register_form">
              <div class="wed-reg-div animated zoomIn">  
                
                <div class="wed-reg-body">
                  <h3 class="register_head">REGISTER FREE</h3>
                  <ul>
                    <li>
                      <div class="child1">
                        Profile for
                      </div>
                      <div class="child2">
                        <select class="wed-reg-input-select" name="profile_for" data-parsley-trigger="change" required>
                          <option>Select</option>
                          <option value="myself">Myself</option>
                          <option value="son">Son</option>
                          <option value="daughter">Daughter</option>
                          <option value="brother">Brother</option>
                          <option value="sister">Sister</option>
                          <option value="relative">Relative</option>
                        </select>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Name
                      </div>
                      <div class="child2">
                        <input class="wed-reg-input" type="text" name="name" data-parsley-trigger="change" required>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Gender
                      </div>
                      <div class="child2">
                        <div class="wed-custom">
                            <input id="male" type="radio" name="gender" value="male" checked="checked">
                            <label for="male">Male</label>
                            <input id="female" type="radio" name="gender" value="female">
                            <label for="female">Female</label>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Birth Date
                      </div>
                      <div class="child2">
                     <!--  <span class="grand_child1"><input type="text" name="dob_day" placeholder="DD"></span>
                      <span class="grand_child1"><input type="text" name="dob_month" placeholder="MM"></span>
                      <span class="grand_child2"><input type="text" name="dob_year" placeholder="YYYY"></span> -->
                      <input class="wed-reg-input datepicker" name="dob" data-parsley-trigger="change" data-date-format="dd-mm-yyyy" placeholder="">
                      </div>

                      <div class="clearfix"></div>
                    </li>
                    <!-- <li>
                      <div class="child1">
                        Are you Catholic
                      </div>
                      <div class="child2">
                        <div class="wed-custom">
                            <input id="catho1" type="radio" name="catholic" value="yes" checked="checked">
                            <label for="catho1">Yes</label>
                            <input id="catho2" type="radio" name="catholic" value="no">
                            <label for="catho2">No</label>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </li> -->
                    <li>
                      <div class="child1">
                        Religion
                      </div>
                      <div class="child2">
                        <select class="wed-reg-input-select religion-selector" placeholder="Select" name="religion" data-parsley-trigger="change" required>
                        <option>- Select -</option>
                        <?php foreach($religions as $rlgn) { ?>
                            <option value="<?php echo $rlgn->religion_id; ?>"><?php echo $rlgn->religion_name; ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                  </ul>
                  <ul>
                    <li>
                      <div class="child1">
                        Caste
                      </div>
                      <div class="child2">
                        <select class="wed-reg-input-select caste-selector" placeholder="Select" name="cast">
                          <option>- Select -</option>
                        </select>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Mother tongue
                      </div>
                      <div class="child2">
                        <select class="wed-reg-input-select" placeholder="Select" name="mother_tongue" data-parsley-trigger="change" required>
                          <option value="0">- Select -</option>
                          <?php foreach($mother_tongue as $mthr_tng) { ?>
                              <option value="<?php echo $mthr_tng->mother_tongue_id; ?>">
                                  <?php echo $mthr_tng->mother_tongue_name ?>
                              </option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Phone
                      </div>
                      <div class="child2">
                        <!-- <span class="india_code">+91</span> -->
                        <span class="country_codes">
                          <input class="wed-reg-input" type="text" name="phone_countrycode" id="mobile-number" data-parsley-trigger="change" required>
                        </span>
                        <span class="phone_input">
                          <input class="wed-reg-input" type="text" placeholder="Mobile Number" name="phone" data-parsley-type="digits"  data-parsley-maxlength="10" data-parsley-minlength="10" data-parsley-trigger="change" required>
                        </span>
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        E mail
                      </div>
                      <div class="child2">
                        <input class="wed-reg-input" type="email" placeholder="Email" name="email" data-parsley-trigger="change" required autocomplete="off">
                      </div>
                      <div class="clearfix"></div>
                    </li>
                    <li>
                      <div class="child1">
                        Password
                      </div>
                      <div class="child2">
                        <input class="wed-reg-input" type="password" placeholder="Password" name="password"  data-parsley-minlength="6" data-parsley-trigger="change" required autocomplete="new-password">
                      </div>
                      <div class="clearfix"></div>
                    </li>
                  </ul>
                  <div class="col-md-12 reg_agree">
                       <div class="wed-custom1">
                          <input id="check1" type="checkbox" value="check1" data-parsley-mincheck="1" data-parsley-trigger="change" required>
                          <label for="check1">I have read and agree to the <a data-toggle="modal" data-target="#tc">T&C</a> and<a data-toggle="modal" data-target="#privacy"> Privacy Policy</a></label>
                      </div>
                     <div class="error w3-animate-top"></div>
                      <div class="wed-submit-btn-bay">
                        <button class="wed-submit-btn" type="button" id="register">Submit</button>
                      </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </form>
        </div>
      <!-- </div> -->
    </div>
	
	
	<!-- PRIVACY-POLICY -->

      <div class="modal fade wed-add-modal" id="privacy" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
            <div class="modal-body  wed-add-modal-body">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Privacy Policy</h4>
              <p class="tc-scroll">Soulmate Matrimony.com is an online matrimonial portal endeavouring constantly to provide you with premium matrimonial services. This privacy statement is common to all the matrimonial sites operated under Soulmate Matrimony.com Since we are strongly committed to your right to privacy, we have drawn out a privacy statement with regard to the information we collect from you.
                We use a secure server for credit card transactions to protect the credit card information of our users and Cookies are used to store the login information.
                What information you need to give in to use this site?
                The information we gather from members and visitors who apply for the various services our site offers includes, but may not be limited to, email address, first name, last name, a user-specified password, mailing address, zip code and telephone number or fax number.
                If you establish a credit account with us to pay the fees we charge, some additional information, including a billing address, a credit card number and a credit card expiration date and tracking information from checks or money orders is collected.
                How the site uses the information it collects/tracks?
                BharatMatrimony collects information from our users primarily to ensure that we are able to fulfill your requirements and to deliver Personalised experience.
                With whom the site shares the information it collects/tracks?
                The information collected from any of our users is not shared with any individual or organisation without the former's approval.
                BharatMatrimony.com does not sell, rent, or loan any identifiable information at the individual level regarding its customers to any third party. Any information you give us is held with the utmost care and security. We are also bound to cooperate fully should a situation arise where we are required by law or legal process to provide information about a customer.
                Do all visitors have to pay?
                NO. All visitors to our site may browse the site, search the ads and view any articles or features our site has to offer without entering any personal information or paying money.
                How to unsubscribe the membership?
                The members are requested to login to the relevant pages for unsubscription.
                Can users contact any number of profiles in a single day?
                As a paid member of this site, you have the privilege to contact hundreds of profiles. However, there is a specified limit to 150 contacts per day for security reasons. If you want to contact more profiles than the specified limit in a single day, you can do so after the completion of 12 hours of login time.
                Notice
                We may change this Privacy Policy from time to time based on your comments or as a result of a change of policy in our company.
                If you have any questions regarding our Privacy Statement, please write in to privacy@Soulmate Matrimony.com
              </p>
            </div>
          </div>
        </div>
      </div>
	  
	  	<!-- TERMS AND CONDITION -->

      <div class="modal fade wed-add-modal" id="tc" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
            <div class="modal-body  wed-add-modal-body">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Terms & Conditions</h4>
              <p class="tc-scroll">Terms and Conditions governing usage of Soulmate Matrimony sites [Applicable for All Services]
              DEAR USER:
              Welcome to Bharatmatrimony (herein referred as "BM").
              BM and its affiliates provide their services to you subject to the following terms and conditions. On your visit or signing up at BM, you consciously accept the terms and conditions as set out hereinbelow. In addition, when you use or visit any current or future BM service or any business affiliated with BM, whether or not included in the BM Web site, you will also be subject to the guidelines and conditions applicable to such service or business. Please read the various services provided by BM before making any payment in respect of any service.
              The Users availing services from BM shall be deemed to have read, understood and expressly accepted and agreed to the terms and conditions hereof and this agreement shall govern the relationship between you and BM and all transactions or services by, with or in connection with BM for all purposes, and shall be unconditionally binding between the parties without any reservation. All rights, privileges, obligations and liabilities of you and/or BM with respect to any transactions or services by, with or in connection with BM for all purposes shall be governed by this agreement. The terms and conditions may be changed and/or altered by BM from time to time at its sole discretion.
              </p>
            </div>
          </div>
        </div>
      </div>

    <!-- FIND -->

    <div class="wed-find-bay">
      <div class="container">
        <form method="post" id="simple_search_form" action="<?php echo base_url(); ?>search">
          <div class="wed-filter-bay">

            <div class="wed-filter-left">
              <div class="wed-custom2">
                <input type="hidden" name="search_type" value="1">
                <input id="male1" type="radio" name="gender" value="female" checked="checked">
                <label for="male1"><p>Bride</p></label>
                <input id="female1" type="radio" name="gender" value="male">
                <label for="female1"><p>Groom</p></label>
              </div>
              <div class="wed-age-div">
                <span>Age</span>
                <span><input class="wed-age-input" id="age_from_id" type="text" name="age_from" required></span>
                <span>to</span>
                <span><input class="wed-age-input" id="age_to_id" type="text" name="age_to" required></span>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="wed-filter-right">
            <span class="wed_filter_span1">Religion</span>
            <span class="wed_filter_span2">
              <select class="wed-age-select religion-selector" name="religion">
                    <option value="0">Select Relegion</option>
                    <?php foreach($religions as $rlgn) { ?>
                          <option value="<?php echo $rlgn->religion_id; ?>"><?php echo $rlgn->religion_name; ?></option>
                    <?php } ?>
              </select>
            </span>
            <span class="wed_filter_span1">Caste</span>
            <span>
              <select class="wed-age-select caste-selector" name="caste">
                <option value="0"> Select Caste </option>
              </select>
            </span>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="wed-search-option">
          <span id="search-by-id-head">
              <span id="search-by-id">Search by ID</span>
              <input type='text' id='matr_id' class='wed-navbar-input' style="display: none;" placeholder='T1234567' name='matri_id'>
          </span>
          <span>|</span>
          <span><a href="<?php echo base_url(); ?>search/advanced?advanced">More Search Options</a></span>
        </div>

        <div class="wed-find-btn-bay">
          <button class="wed-find-btn" type="submit" id="search_user">Find</button>
        </div>

      </form>
      </div>
    </div>


<!-- ////////////////////////////////// START SECTIONS -->


<!-- /////////////////////////////////////////////////////////////////// HIGHLIGHTED-PROFILES  START-->

        <!-- <div class="wed-highlight-profile">
          <div class="container">
            <h2>Highlighted Profiles</h2>
            <ul>
              <li>
                <div class="wed-high-profile">
                  <img src="<?php echo base_url(); ?>assets/img/pic1.png">
                </div>
                <h5>Alan Flem</h5>
                <p>BCA, MCA ( 27 )</p>
              </li>
              <li>
                <div class="wed-high-profile">
                  <img src="<?php echo base_url(); ?>assets/img/pic2.png">
                </div>
                <h5>Ronald Mcray</h5>
                <p>B-Tech, MCA ( 26 )</p>
              </li>
              <li>
                <div class="wed-high-profile">
                  <img src="<?php echo base_url(); ?>assets/img/pic3.png">
                </div>
                <h5>Johny Dep</h5>
                <p>MCA ( 28 )</p>
              </li>
              <li>
                <div class="wed-high-profile">
                  <img src="<?php echo base_url(); ?>assets/img/pic4.png">
                </div>
                <h5>Alan Flem</h5>
                <p>BCA ( 25 )</p>
              </li>
              <li>
                <div class="wed-high-profile">
                  <img src="<?php echo base_url(); ?>assets/img/pic5.png">
                </div>
                <h5>Peter Hughes</h5>
                <p>MBA ( 29 )</p>
              </li>
              <li>
                <div class="wed-high-profile">
                  <img src="<?php echo base_url(); ?>assets/img/pic6.png">
                </div>
                <h5>Harold Schewenger</h5>
                <p>BBA, MSW ( 26 )</p>
              </li>
              <li>
                <div class="wed-high-profile">
                  <img src="<?php echo base_url(); ?>assets/img/pic1.png">
                </div>
                <h5>Abraham Lopez</h5>
                <p>BBA ( 25 )</p>
              </li>
              <li>
                <div class="wed-high-profile">
                  <img src="<?php echo base_url(); ?>assets/img/pic2.png">
                </div>
                <h5>Mathew Carman</h5>
                <p>B-Tech</p>
              </li>
              <li>
                <div class="wed-high-profile">
                  <img src="<?php echo base_url(); ?>assets/img/pic3.png">
                </div>
                <h5>Franklin George</h5>
                <p>B-Tech ( 28 )</p>
              </li>
              <li>
                <div class="wed-high-profile">
                  <img src="<?php echo base_url(); ?>assets/img/pic4.png">
                </div>
                <h5>Philipe Roges</h5>
                <p>BBA, MBA ( 26 )</p>
              </li>
            </ul> 
          </div>
        </div>-->

<?php if($profile_highlight) { ?>
     <div class="wed-highlight-profile">
        <div class="container">
          <h2>Highlighted Profiles</h2>
          <div class="profile">            
            <div class="carousel">
            <?php  
			//print_r($profile_highlight);die;
			foreach($profile_highlight as $highlight) { 
			if(!$session=$this->session->userdata('logged_in')){
			?>
			
              <div class="profile_image">
                 <a class="highlit" data-id="<?php echo $highlight->matrimony_id; ?>"><img src="<?php echo base_url().'/'.$highlight->profile_photo; ?>"></a>
                 <h5><?php echo $highlight->profile_name;?></h5>
                 <p><?php echo $highlight->education;?>, ( <?php echo $highlight->age;?> )</p>
              </div>
              <?php } else { ?>
              <div class="profile_image">
                 <a href="<?php echo base_url()?>profile/profile_details/<?php echo $highlight->matrimony_id;?>"><img src="<?php echo base_url().'/'.$highlight->profile_photo; ?>"></a>
                 <h5><?php echo $highlight->profile_name;?></h5>
                 <p><?php echo $highlight->education;?>, ( <?php echo $highlight->age;?> )</p>
              </div>
              <?php } }?>
            </div>
            <div class="carousel-nav">
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
            </div>
            <div class="carousel-arrows"></div>
          </div>
        </div>
      </div>
      <?php } ?>
        <!-- <div class="wed-space"></div> -->

<!-- /////////////////////////////////////////////////////////////////// HIGHLIGHTED-PROFILES  END-->
        

       <!--     <div class="wed-succes-stories">
          <h2>Success Stories</h2>
          <ul>
            <li class="animated flipInY">
              <div class="wed-succes-story">
                <img src="<?php echo base_url(); ?>assets/img/pic7.png">
              </div>
              <h6>Peter & Lora</h6>
              <p>"Your wide profile base helped<br>
                us to find each other."</p>
            </li>
            <li class="animated flipInY">
              <div class="wed-succes-story">
                <img src="<?php echo base_url(); ?>assets/img/pic8.png">
              </div>
              <h6>Lewis & Helen</h6>
              <p>"Thank You for helping us<br>
                  find each other."</p>
            </li>
            <li class="animated flipInY">
              <div class="wed-succes-story">
                <img src="<?php echo base_url(); ?>assets/img/pic9.png">
              </div>
              <h6>Joe & Mariya</h6>
              <p>"Your wide profile base helped<br>
                us to find each other."</p>
            </li>
          </ul>
          <div class="wed-find-btn-bay">
            <button class="wed-find-btn1">See more Success Stories</button>
          </div>
        </div>-->

<!-- /////////////////////////////////////////////////////////////////// SUCCESS-STORIES START-->
<?php if($success) { ?>
       <div class="wed-succes-stories">
          <div class="wed-succes-stories-overlay">
            <div class="container">
              <h2>Success Stories</h2>

              <div classs="success_stories">
                <div class="slider">
				  <?php 
				  //print_r($success);die;
				  
				  foreach($success as $success_story) { ?>
                    <div class="slide">
                      <div class="slide">
                        <img src="<?php echo base_url().'/'.$success_story->photo; ?>">
                        <h6><?php echo $success_story->name;?></h6>
							 <p><?php echo $success_story->story;?></p>
                      </div>                
                    </div>
					  
					<?php } ?>
				
                </div>
                
              </div>
			  <p>
          </div>
        </div>
      </div>
 <?php } ?>
<!-- /////////////////////////////////////////////////////////////////// SUCCESS-STORIES END-->


<!-- /////////////////////////////////////////////////////////////////// ABOUT START -->

     <div class="wed-about">
        <div class="wed-about-overlay">
          <div class="container">
            <!-- <h2><?php echo $content->content_header?></h2>
            <p><?php echo $content->content_para?></p>-->
            
            <div class="col-md-4">
              <img src="<?php echo base_url(); ?>assets/images/home_girl.png">
            </div>
            <div class="col-md-8">
			<h2><?php echo $content->content_header?></h2>
            <p><?php echo $content->content_para?></p>
			
			
              <!--<h2>About Soulmate Matrimony</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam bibendum vitae purus vel
                blandit. Sed nec laoreet ipsum, et facilisis purus. Nulla eleifend nisl eget urna viverra
                tristique. Duis ullamcorper pharetra orci, eget fringilla ipsum pulvinar vehicula. Ut
                fermentum vel velit in finibus. Phasellus sit amet quam placerat, dictum augue ac,
                malesuada dolor. Donec rutrum interdum enim sed facilisis. Pellentesque habitant morbi
                tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas pharetra
                blandit mi, non aliquam leo rutrum sit amet. Donec pretium blandit eros, at interdum
                urna placerat consectetur. Duis sit amet dictum magna, sit amet euismod nisi.</p>-->
                <div class="wed-find-btn-bay1">
                  <!-- <a href="<?php echo $content->content_link?>"><button class="wed-find-btn1"><?php echo $content->content_button?></button></a> -->
                  <a href="#">
                    <button class="wed-find-btn1"><?php echo $content->content_button?>
                      <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                    </button>
                  </a>
                </div>
            </div>
          </div>
        </div>
      </div>
<!-- /////////////////////////////////////////////////////////////////// ABOUT END -->

<section class="module parallax parallax-1">
  <div class="wed-index-parallax-overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="wed-parallax-detail">
           <h5><strong><?php echo $footer->footer_header?></strong> </h5>
            <!--<h5><strong>Soulmate Matrimony</strong> </h5>-->
            <h5>Mobile App</h5>
            <!--<p>Get on the app & experience matchmaking on the go.</p>-->
            <p><?php echo $footer->footer_para?>.</p> 
            <div class="wed-download-bay">
              <li><img src="<?php echo base_url(); ?>assets/img/googleplay.png"></li>
              <li><img src="<?php echo base_url(); ?>assets/img/appstore.png"></li>
            </div>
          </div>
        </div>

        <div class="col-md-7 animatedParent" data-sequence='500'>
          <div class="wed-index-phone animated bounceInLeft" >
             <img src="<?php echo base_url(); ?>admin/<?php echo $footer->footer_image;?>">
            <!--<img src="<?php echo base_url(); ?>assets/images/home_phone.png">-->
          </div>
        </div>

        </div>
      </div>
    </div>
  </div>
</section>

 <div class="modal fade wed-add-modal web-add-modal-custom" id="login1" role="dialog">
      <div class="modal-dialog wed-add-modal-dialogue">
        <div class="modal-content wed-add-modal-content  login_modal_content">
          
          <div class="modal_close">
            <button class="modal_close_btn" data-dismiss="modal">
              <i class="fa fa-times" aria-hidden="true"></i>
            </button>
          </div>

          <div class="login_modal">
            <div class="login_modal_head">
              <span class="login_modal_img"><img src="<?php echo base_url(); ?>assets/images/login.png"></span>
              Login
            </div>             
            <form  id="loginhigh_form1">
              <input class="wed-navbar-input" type="text" placeholder="Email/Matrimonyid" name="email" data-parsley-trigger="change" required>
              <input class="wed-navbar-input" type="password" placeholder="password" name="password" data-parsley-trigger="change" required>
              <div class="login_modal_remember">
                  <input id="remember_me" type="checkbox" name="remember" value="1">
                  <!-- <input id="remember_me" type="checkbox" value="check1" data-parsley-mincheck="1" data-parsley-trigger="change" required> -->
                  <label for="remember_me">Remember me</label>
              </div>
              <div class="modal_login_button">
                <button class="wed-login" id="login_userhighlight" type="button">Login</button>
                 <p data-toggle="modal" data-target="#forgot" class="forgot">Forgot Password</p>
				  <div class="forgot" id="errmsg"></div>
              </div> 
			 
            </form>
          </div>
        </div>
      </div>
    </div>
    
        <!-- MODAL FOR LOGIN ERROR START -->
    <div class="modal fade wed-add-modal web-add-modal-custom" id="loginError" role="dialog">
      <div class="modal-dialog wed-add-modal-dialogue">
        <div class="modal-content wed-add-modal-content  login_modal_content">
          
          <div class="modal_close">
            <button class="modal_close_btn" data-dismiss="modal">
              <i class="fa fa-times" aria-hidden="true"></i>
            </button>
          </div>

          <div class="login_modal">
            <div class="login_modal_head">
              <span class="login_modal_img"><img src="<?php echo base_url(); ?>assets/images/login.png"></span>
              Login Error
            </div>             
            <div class="login_modal_head">
            Invalid Email/Matrimonyid or password
              </div>
              <div class="modal_login_button">
                <button class="wed-login" data-dismiss="modal">Close</button>
              </div> 
            </div>
          </div>
        </div>
      </div>
 
    <!-- MODAL FOR LOGIN ERROR END -->

    <!-- FOOTER -->
<script src = "<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
<script>
$( document ).ready(function() {

// -------------------------FOR HIGHLIGHT PROFILE SLIDER
$(window).load(function() {
  var width = $(window).width();
    if(width >= 768) {
      $('.carousel').slick({
          infinite: true,
          slidesToShow: 5,
          slidesToScroll: 1,
          arrows: false,
          centerMode: true,
          centerPadding: '10px',
          variableWidth: false

      });

      $('.carousel-nav').slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: false,
          arrows: true,
          appendArrows: '.carousel-arrows',
          prevArrow: '<div class="nav_left"><img src="<?php echo base_url(); ?>assets/images/left_ar.png"></div>',
          nextArrow: '<div class="nav_right"><img src="<?php echo base_url(); ?>assets/images/right_ar.png"></div>',
          asNavFor: '.carousel',

      });
    }
});

$(window).load(function() {
  var width = $(window).width();
    if(width < 768) {
      $('.carousel').slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          centerMode: true,
          centerPadding: '10px',
          variableWidth: false

      });

      $('.carousel-nav').slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: false,
          arrows: true,
          appendArrows: '.carousel-arrows',
          prevArrow: '<div class="nav_left"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
          nextArrow: '<div class="nav_right"><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
          asNavFor: '.carousel',

      });
    }
});


//-------------------------- FOR SUCCESS STORY SLIDER



$(window).load(function() {
  var width = $(window).width();
    if(width > 700) {
      $('.slider').slick({
        slidesToShow: 3,
        centerMode: true,
        centerPadding: "0px",
        speed: 500
      });
    }
});


$(window).load(function() {
  var width = $(window).width();
  if(width < 480) {
    $('.slider').slick({
      slidesToShow: 1,
      centerMode: true,
      centerPadding: "0px",
      speed: 500
    });
  }
});



// -------------------------FOR DATEPICKER
      $('.datepicker').datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: "yy-mm-dd",
          yearRange: "1970:2000"
      });

    $(".religion-selector").on('change', function () {
        var valueSelected = $(this).val();
        var passdata_1 = 'rlgn_sel='+ valueSelected;

        $.ajax({
        type: "POST",
        url : '<?php echo base_url(); ?>home/getCaste',
        data:  passdata_1,
        success: function(data){
                $(".caste-selector").html(data);
            }
        });
    });

    $(document).on("click","#search-by-id",function() {
        $('#matr_id').show();
        $('#search-by-id').hide();
        document.getElementById("age_from_id").required = false;
        document.getElementById("age_to_id").required = false;
    });

    /*$(document).on("click","#search_user",function() {
        if($('#simple_search_form').parsley().validate()) {

            var value =$("#simple_search_form").serialize();
            console.log(value);
            window.location.href= base_url+"search/?"+value;
      }
    });*/

    $(document).on("click","#register",function() {
        if($('#register_form').parsley().validate()) {

            var value =$("#register_form").serialize();
            $.ajax({
                type: "POST",
                url: base_url+'home/customer_registration',
                data: value,
                error: function (err) {
              console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
              },
                success: function(data) {
                data = JSON.parse(data);
                if(data==1){
                  window.location.href= base_url+"home/registration_details";
                }
                else if(data==2){
                  $('.error').html('Phone number already exist');
                }
                else {
                  $('.error').html('Email already exist');
                }
            }
        });

      }
      
       else{
		  $('.error').html('Please Agree T&C and Privacy Policy');
	  }
      
    });
});


	$(".highlit").on('click',function(){
        var mid = $(this).data('id');
		$('#login1').modal('show');
		highlight(mid);
	});
		
	function highlight(mid){ 
		$("#login_userhighlight").on('click',function(){   
		  var data = $('#loginhigh_form1').serialize();
			  $.ajax({
                type: "POST",
                url: base_url+'home/loginhighlight',
                data: data,
                success: function(data) {  
                    val = JSON.parse(data);  
    				if(val['status']="success"){ 
    					window.location.href = base_url+"Profile/profile_details/"+mid;
    				}
    				else{ 
    				
                    $('#login1').modal('hide');
    				$('#loginError').modal('show');
    			
    				}
                }
            
             });
		
		 });
		}
		   

		   
	 
</script>



</body></html>