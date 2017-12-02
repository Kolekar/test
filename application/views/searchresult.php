
<?php
$session=$this->session->userdata('user_values');
$settings= get_setting();
?>
<style>
.wed-height { width: 45px; }
.wed-height1 { width: 100px; }
</style>
<!-- FIRST BANNER -->
      <section class="module parallax parallax-2">
        <div class="wed-wrapper-recent-view">
          <div class="container">
            <div class="col-md-5">
                <div class="match_sec_one">
                  <img src="<?php echo base_url(); ?>assets/images/love_add.png">
                </div>
            </div>
            <div class="col-md-7">
              <div class="match_sec_two">
                <h4>New Matches</h4>
                <p>Listed below are new profiles that match your <br> partner preferences.</p>
              </div>
            </div>
          </div>
        </div>
    </section>

    <!-- PROFILE-BANNER -->
  <div class="wed-search-div-main">
    <div class="container"><?php if(!empty($srch_candidates)){?>
    <h4>Search Results <strong><?php if(!empty($srch_candidates)) { echo count($srch_candidates); } else { echo "0"; } ?> Matches Found</strong></h4><?php } ?>
    <h3>Discover your soulmate based on personalities, hobbies and interests</h3>
    <div class="wed-search-sort-list">
      <ul>
        <li>Family oriented (1169)</li>
        <li>Warm & Friendly (162)</li>
        <li>Enjoys music (435)</li>
        <li>Enjoys food (46)</li>
      </ul>
      <div class="wed-more">More</div>
      <div class="wed-space1"></div>
    </div>
    <hr>
    </div>
  </div>
  <div class="wed-search-result">
    <div class="container">
      <div class="row">
        <div class="col-md-3 padding-right0">
          <div class="wed-search-filter-div">
            <h5>Filter Results</h5>
            <form method="post" id="filter_form" action="<?php echo base_url(); ?>search">
            <input type="hidden" name="search_type" value="1">
            <div class="wed-search-filter">
                <div class="wed-filter-collapse"  role="tablist" aria-multiselectable="true">
                    <div id="accordion" class="wed-filter-section">
                      <div class="panel custom_panel">
                        <div class="wed-filter-heading" role="tab" id="headingOne" data-collapsed-icon="<i class='more-less glyphicon glyphicon-plus'></i>" data-expanded-icon="<i class='more-less glyphicon glyphicon-minus'></i>">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                              Show profiles Created
                              <i class="more-less glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                        <div id="collapseOne" class="wed-filter-panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <ul>
                            <li>Within a day
                              <div class="wed-custom3 floatr">
                                  <input id="check1" class="create check_1" type="checkbox" name="create[]" value="1" >
                                  <label for="check1"></label>
                                </div>
                            </li>
                              <li>Within a week
                                <div class="wed-custom3 floatr">
                                    <input id="check2" class="create check_2" type="checkbox" name="create[]" value="2">
                                    <label for="check2"></label>
                                  </div>
                              </li>
                                <li>Within a month
                                  <div class="wed-custom3 floatr">
                                      <input id="check3" class="create check_3" type="checkbox" name="create[]" value="3">
                                      <label for="check3"></label>
                                    </div>
                                </li>
                                <button class="wed-btn-view1" type="submit" my_attr="create">Submit</button>
                          </ul>

                        </div>


                        <!-- FOR ACTIVE -->
                        <div class="wed-filter-heading" role="tab" id="headingOne">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="true" aria-controls="collapse15">
                              Active
                              <i class="more-less glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                        <div id="collapse15" class="wed-filter-panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <ul>
                            <li>Active now
                               <div class="wed-custom3 floatr">
                                  <input class="misc_type photo check_1" id="check4" type="checkbox" name="photo" value="1">
                                  <label for="check4"></label>
                                </div> 
                            </li>
                             <button class="wed-btn-view1" type="submit" my_attr="photo" >Submit</button> 
                          </ul>
                        </div>


                        <div class="wed-filter-heading" role="tab" id="headingOne">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                              Profile Type
                              <i class="more-less glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                        <div id="collapsethree" class="wed-filter-panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <ul>
                            <li>With Photo (<?php echo $photo_count; ?>)
                              <div class="wed-custom3 floatr">
                                  <input class="misc_type photo check_1" id="check4" type="checkbox" name="photo" value="1">
                                  <label for="check4"></label>
                                </div>
                            </li>
                            <button class="wed-btn-view1" type="submit" my_attr="photo" >Submit</button>
                          </ul>
                        </div>

                        <div class="wed-filter-heading" role="tab" id="headingOne">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                              Age
                              <i class="more-less glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                        <div id="collapsefour" class="wed-filter-panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <ul>
                            <li>
                              <span>
                              <select class="wed-height" name="age_from">
                                <option value="0">MIN</option>
                                <?php for($i=18;$i<=70;$i++) { ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                              </select>
                              </span>
                              <span>To &nbsp;
                                <select class="wed-height" name="age_to">
                                <option value="0">MAX</option>
                                <?php for($i=18;$i<=70;$i++) { ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                              </select>
                              </span>
                            </li>
                              <button class="wed-btn-view1" type="submit" my_drop="age">Submit</button>
                          </ul>
                        </div>

                        <div class="wed-filter-heading" role="tab" id="headingOne">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
                              Height
                              <i class="more-less glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                        <div id="collapsefive" class="wed-filter-panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <ul>
                            <li>
                              <!-- <div class="match_size">
                                <input type="hidden" name="search_type" value="1">
                                <input id="incm" type="radio" name="size" value="cm" checked="checked">
                                <label for="incm"><p>In Cms</p></label>
                                <input id="ininch" type="radio" name="size" value="male">
                                <label for="ininch"><p>In Inches</p></label>
                              </div> -->
                              <div class="height_det">
                                  <div class="cm_input">
                                  <select class="wed-height wed-height1" name="height_from">
                                      <option value="0">MIN</option>
                                      <?php foreach($heights as $heightd) { ?>
                                        <option value="<?php echo $heightd->height_id; ?>"><?php echo $heightd->height; ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                  <div class="match_to">To </div>
                                  <div class="inch_input">
                                     <!-- <input type="text" name="" class="my_match_input"> -->
                                     <select class="wed-height wed-height1" name="height_to">
                            <option value="0">MAX</option>
                                <?php foreach($heights as $heightb) { ?>
                                  <option value="<?php echo $heightb->height_id; ?>"><?php echo $heightb->height; ?></option>
                                <?php } ?>
                            </select>
                                  </div>
                                  <!-- <div class="size_check">
                                    <input id="size_checkbox" type="checkbox" name="selected" value="">
                                    <label for="size_checkbox"></label>
                                  </div> -->
                              </div>
                            </li>
                            <button class="wed-btn-view1" type="submit" my_drop="height">Submit</button>
                          </ul>
                        </div>




                          <!-- <ul>
                            <li>
                            <select class="wed-height wed-height1" name="height_from">
                            <option value="0">MIN</option>
                                <?php foreach($heights as $heightd) { ?>
                                  <option value="<?php echo $heightd->height_id; ?>"><?php echo $heightd->height; ?></option>
                                <?php } ?>
                            </select>
                            <select class="wed-height wed-height1" name="height_to">
                            <option value="0">MAX</option>
                                <?php foreach($heights as $heightb) { ?>
                                  <option value="<?php echo $heightb->height_id; ?>"><?php echo $heightb->height; ?></option>
                                <?php } ?>
                            </select>
                            </li>
                              <button class="wed-btn-view1" type="submit" my_drop="height">Submit</button>
                          </ul>
                        </div>-->

                        <div class="wed-filter-heading" role="tab" id="headingOne">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesix" aria-expanded="true" aria-controls="collapsesix">
                              Marital Status
                              <i class="more-less glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                        <div id="collapsesix" class="wed-filter-panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <ul>
                            <li>Never Married<div class="wed-custom3 floatr">
                                <input class="mart check_1" id="check7" type="checkbox" name="mart[]" value="1">
                                <label for="check7"></label>
                              </div></li>
                            <li>Divorsed<div class="wed-custom3 floatr">
                                <input class="mart check_2" id="check8" type="checkbox" name="mart[]" value="2">
                                <label for="check8"></label>
                              </div>
                            </li>
                            <li>Widowed<div class="wed-custom3 floatr">
                                <input class="mart check_3" id="check9" type="checkbox" name="mart[]" value="3">
                                <label for="check9"></label>
                              </div></li>
                            <li>None<div class="wed-custom3 floatr">
                                <input class="mart check_4" id="check10" type="checkbox" name="mart[]" value="4">
                                <label for="check10"></label>
                              </div></li>
                              <button class="wed-btn-view1" type="submit" my_attr="mart">Submit</button>
                          </ul>
                        </div>

                        <div class="wed-filter-heading" role="tab" id="headingOne">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseseven" aria-expanded="true" aria-controls="collapseseven">
                              Mother Tongue
                              <i class="more-less glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                        <div id="collapseseven" class="wed-filter-panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <ul class="country_living">
                            <?php $k=100; foreach($mother_tongue as $mthr) { ?>
                            <li><?php echo $mthr->mother_tongue_name; ?>
                              <div class="wed-custom3 floatr">
                                <input class="mother check_<?php echo $mthr->mother_tongue_id; ?>" id="mthr<?php echo $k; ?>" type="checkbox" name="mother[]"
                                value="<?php echo $mthr->mother_tongue_id; ?>">
                                <label for="mthr<?php echo $k; ?>"></label>
                              </div>
                            </li>
                            <?php $k= $k+1; } ?>
                            <button class="wed-btn-view1" type="submit" my_attr="mother">Submit</button>
                          </ul>
                        </div>

                        <!-- <div class="wed-filter-heading" role="tab" id="headingOne">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseeight" aria-expanded="true" aria-controls="collapseeight">
                              Caste
                              <i class="more-less glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                        <div id="collapseeight" class="wed-filter-panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <ul class="country_living ">
                          <?php $l=200; foreach($caste as $cast) { ?>
                            <li><?php echo $cast->caste_name; ?>
                            <div class="wed-custom3 floatr">
                                <input class="caste check_<?php echo $cast->caste_id; ?>" id="cast<?php echo $l; ?>" type="checkbox" name="caste[]"
                                value="<?php echo $cast->caste_id; ?>">
                                <label for="cast<?php echo $l; ?>"></label>
                              </div>
                            </li>
                            <?php $l=$l+1; } ?>
                            <button class="wed-btn-view1" type="submit" my_attr="caste">Submit</button>
                          </ul>
                        </div> -->

                        <!-- FOR STAR -->
                        <div class="wed-filter-heading" role="tab" id="headingOne">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsenine" aria-expanded="true" aria-controls="collapsenine">
                              Star
                              <i class="more-less glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                        <div id="collapsenine" class="wed-filter-panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <ul class="country_living">
                          <?php $m=100; foreach($stars as $star) { ?>
                            <li><?php echo $star->star_name; ?><div class="wed-custom3 floatr">
                                <input id="star<?php echo $m; ?>" type="checkbox" name="stars[]"
                                value="<?php echo $star->star_id; ?>">
                                <label for="star<?php echo $m; ?>"></label>
                              </div></li>
                          <?php $m=$m+1; } ?>
                          <button class="wed-btn-view1" type="submit" my_attr="stars" >Submit</button>
                          </ul>
                        </div> 

                        <div class="wed-filter-heading" role="tab" id="headingOne">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseten" aria-expanded="true" aria-controls="collapseten">
                              Education
                              <i class="more-less glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                        <div id="collapseten" class="wed-filter-panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <ul class="country_living">
                            <?php $n=100; foreach($educations as $educ) { ?>
                            <li>
                              <div class="align_left"><?php echo $educ->education; ?></div>
                              <div class="wed-custom3 align_right">
                                <input id="educ<?php echo $n; ?>" type="checkbox" name="educs[]"
                                value="<?php echo $educ->education_id; ?>">
                                <label for="educ<?php echo $n; ?>"></label>
                              </div>
                            </li>
                            <?php $n=$n+1; } ?>
                            <button class="wed-btn-view1" type="submit" my_attr="educ">Submit</button>
                          </ul>
                        </div>

                        <div class="wed-filter-heading" role="tab" id="headingOne">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="true" aria-controls="collapse11">
                              Annual Income
                              <i class="more-less glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                        <div id="collapse11" class="wed-filter-panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <ul>
                            <li>
                              <select class="wed-height wed-height1" name="income" style="width: 125px !important;">
                                  <option value="0-0">Select</option>
                                  <option value="0-1">Unspecified</option>
                                  <option value="1-100000-">Below 1 Lakh</option>
                                  <option value="100001-500000">1 - 5 Lakh</option>
                                  <option value="500001-1000000">5 - 10 Lakh</option>
                                  <option value="1000000-0">Above 10 Lakh</option>
                            </select>
                            </li>
                              <button class="wed-btn-view1" type="submit" my_drop="income">Submit</button>
                          </ul>
                        </div>

                        <div class="wed-filter-heading" role="tab" id="headingOne">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="true" aria-controls="collapse12">
                              Country Living In
                              <i class="more-less glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                        <div id="collapse12" class="wed-filter-panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <ul class="country_living">
                            <?php $o=100; foreach($country as $ctry) { ?>
                            <li>
                                <div class="align_left"><?php echo $ctry->country_name; ?></div>
                                <div class="wed-custom3 align_right">
                                  <input class="country check_<?php echo $ctry->country_id; ?>" id="ctry<?php echo $o; ?>" type="checkbox" name="country[]"
                                  value="<?php echo $ctry->country_id; ?>">
                                  <label for="ctry<?php echo $o; ?>"></label>
                                </div>
                            </li>
                            <?php $o=$o+1; } ?>
                            <button class="wed-btn-view1" type="submit" my_attr="country">Submit</button>
                          </ul>
                        </div>
						          <div class="wed-filter-heading" role="tab" id="headingOne">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="true" aria-controls="collapse13">
                              State
                              <i class="more-less glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                        <div id="collapse13" class="wed-filter-panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                          <ul class="country_living">
                          <?php $p=100; foreach($state as $stat) { ?>
                            <li><?php echo $stat->state_name; ?><div class="wed-custom3 floatr">
                                <input class="state check_<?php echo $stat->state_id; ?>" id="stat<?php echo $p; ?>" type="checkbox" name="state[]"
                                value="<?php echo $stat->state_id; ?>">
                                <label for="stat<?php echo $p; ?>"></label>
                              </div></li>
                          <?php $p=$p+1; } ?>
                          <button class="wed-btn-view1" type="submit" my_attr="state">Submit</button>
                          </ul>
                        </div>

                      </div>
                    </div>
                  </div>
              </div>
              </form>
            </div>
        </div>
        <div class="col-md-9"><?php if(!empty($srch_candidates)) {   ?> 
          <div class="wed-search-result-div">
		
            <div class="pagination_go">
              <div class="wed-page-go">

                <input class="wed-page-go-text" type="text">
                  <span>Go</span>
              </div>
              
              <div class="wed-pagination">
                <ul>
                  <li><img src="<?php echo base_url(); ?>assets/img/pager-l.png"></li>
                   <?php foreach ($links as $link) { echo "<li>". $link."</li>"; } ?>
                  <li><img src="<?php echo base_url(); ?>assets/img/pager-r.png"></li>
                </ul>
              </div>
              
            </div>

            <div class="wed-search-result-head">
              <div class="wed-sort">
                Sort by<span><select class="wed-sort-select">
                  <option>Relevance</option>
                </select></span>
              </div>

              <button class="wed-sent-interest-all">Send Interest to all</button>

              <div class="list_icons">
                <!-- <span class="list_icon1"><i class="fa fa-th-list" aria-hidden="true"></i></span>
                <span class="list_icon2"><i class="fa fa-th" aria-hidden="true"></i></span> -->

                <!-- <span class="list_icon1"> -->
                  <img class="list_icon1" src="<?php echo base_url(); ?>/assets/images/list_icon2.png">
                <!-- </span> -->
                <!-- <span class="list_icon2"> -->
                  <img class="list_icon2" src="<?php echo base_url(); ?>/assets/images/list_icon4.png">
                <!-- </span> -->

                <!-- <span class="list_iconc"><img src="<?php echo base_url(); ?>/assets/images/list_icon1.png"></span>
                <span class="list_icond"><img src="<?php echo base_url(); ?>/assets/images/list_icon3.png"></span>  -->
              </div>



              <div class="clearfix"></div>
            </div>
            <?php if(!empty($srch_candidates)) { 
              foreach($srch_candidates as $candidate) {
                /* if($settings['profilevisibility_preference']==1){*/
                  if(isset($candidate->membership)) { $membr = $candidate->membership; }
                  if($this->session->userdata('logged_in')) {
                      echo "<a href=".base_url()."profile/profile_details/".$candidate->matrimony_id.">";
                  } else {
                      echo "<a href='' data-toggle='modal' data-target='#reglog'>";
                  }
              ?>

            <div class="wed-search-listing">
            <ul>

              <li>
                <div class="eye"></div>
                <div class="close"></div>
                <div class="web-search-photo">
                  <div class="web-search-pic">
                    <?php  if($candidate->profile_photo == "")  { ?>
                        <img src="<?php echo base_url(); ?>/assets/img/user.jpg">
                    <?php } else if($candidate->profile_photo != "" && $candidate->profile_preference==0){ ?>
                        <img src="<?php echo base_url().$candidate->profile_photo; ?>">
                    <?php }  else if($candidate->profile_photo != "" && $candidate->profile_preference==1){ ?>
                        <img src="<?php echo base_url().$candidate->profile_photo_blured; ?>">
                        <?php } ?>
                  </div>
                  <h5><?php echo $candidate->profile_name;?></h5>
                  <p><?php echo $settings->id_prefix;?><?php echo $candidate->matrimony_id; ?></p>
                  <div class="wed-space3">
                  </div>
                  <span><img src="<?php echo base_url(); ?>assets/img/online.png">Online</span>
                </div>
                <div class="web-search-detail">

                  <div class="wed-premium">
                   Premium Member
                  </div>
                  <div class="clearfix"></div>


                <!-- <?php if($candidate->is_premium == 1) { ?>
                  <div class="wed-premium">
                   <?php echo "Premium member"; ?>
                  </div>
				          <div class="clearfix"></div>
                  <?php } ?> -->
                  <div class="list">
                    <ul>
                      <li>
                        <div class="childs1">Age</div>
                        <div class="childs2">
                          <?php
                            $now = new DateTime();
                            $age = $now->diff(new DateTime($candidate->dob));
                            echo $age->format('%Y')?> Yrs</div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="childs1">Height</div>
                        <div class="childs2"><?php echo $candidate->height;?></div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="childs1">Religion</div>
                        <div class="childs2"><?php echo $candidate->religion_name;?></div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="childs1">Caste,Sub Caste</div>
                        <div class="childs2"><?php echo $candidate->caste_name.", ".$candidate->sub_caste;?></div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                  <div class="list">
                    <ul>
                      <li>
                        <div class="childs1">Star</div>
                        <div class="childs2"><?php echo $candidate->star_name;?></div>
                        <div class="clearfix"></div>
                      </li> 
                      <li>
                        <div class="childs1">Location</div>
                        <div class="childs2"><?php echo $candidate->city_name.", ".$candidate->state_name.", ".$candidate->country_name;?></div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="childs1">Education</div>
                        <div class="childs2"><?php echo $candidate->education;?></div>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                        <div class="childs1">Profession</div>
                        <div class="childs2"><?php echo $candidate->occupation;?></div>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                  <div class="clearfix"></div>
                  <div class="wed-search-btm">
                    <p><?php echo $candidate->about_you;?></p>
                  </div></a>
                <!--  <span>
                     
                    <a class="tool_tip" data-toggle="modal" data-target='#view_mob' data-placement="top" title="" data-original-title="Mobile Number">
                      <img src="<?php echo base_url(); ?>assets/img/mob.png">
                    </a>
                  </span>
                  <span>
                    <a class="tool_tip"  id="print" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print">
                      <img src="<?php echo base_url(); ?>assets/images/save.png">
                    </a>
                  </span>-->

                  <!-- <span><img src="<?php echo base_url(); ?>assets/img/mob.png"></span>
                  <span><img src="<?php echo base_url(); ?>assets/images/save.png"></span> -->
                  <div class="wed-search-btn-bay">
                    <?php if($this->session->userdata('logged_in')) {
                     if((isset($membr->total_sendmail)) && ($membr->total_sendmail == 0)) { ?>
                    <button class="wed-mail" data-toggle='modal' data-target='#no_send'>Send mail</button>
                    <?php } else { ?>
                    <input type="button" class="wed-mail" value="Send Mail" data-toggle='modal' data-target='#send_mail_<?php echo $candidate->profile_id;?>' />
                    <?php } } else { ?>
                      <button class="wed-mail" data-toggle='modal' data-target='#reglog'>Send mail</button>
                  <?php } ?>
                    <?php if($this->session->userdata('logged_in')) {
                              if((isset($candidate->shortlisted)) && ($candidate->shortlisted == 1)) { ?>
                                  <button class="wed-shortlist">Shortlisted</button>
                              <?php } else { ?>
                                  <button class="wed-shortlist shortlist" proc_name="<?php echo $candidate->profile_name; ?>" matr_id="<?php echo $candidate->matrimony_id; ?>">Short List</button>
                              <?php } } else { ?>
                      <button class="wed-shortlist" data-toggle='modal' data-target='#reglog'>Short List</button>
                  <?php }
                   if($this->session->userdata('logged_in')) {
                    if((isset($candidate->interested)) && ($candidate->interested == 1)) { ?>
                    <button class="wed-interest">Already Interested</button>
                    <?php } else { ?>
                    <?php if((isset($membr->total_sendmail)) && ($membr->total_interest == 0)) { ?>
                    <button class="wed-interest" data-toggle='modal' data-target='#no_interest' type="submit">Send Interest</button>
                    <?php } else { ?>
                    <button class="wed-interest send_interest" proc_name="<?php echo $candidate->profile_name; ?>" matr_id="<?php echo $candidate->matrimony_id; ?>">Send Interest</button>
                    <?php } } }else{?>
                    <button class="wed-interest" data-toggle='modal' data-target='#reglog'>Send Interest</button>
                    <?php } ?>
                  </div>
                </div>
                <div class="clearfix"></div>
              </li>

            </ul>
          </div>

      <div class="modal fade wed-add-modal" id="send_mail_<?php echo $candidate->profile_id;?>" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
            <div class="modal-body  wed-add-modal-body">
            <form method="post" id="send_form_<?php echo $candidate->profile_id;?>">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Send Message to <?php echo $candidate->profile_name;?></h4>
              <p>Enter your message</p>
            <div class="wed-add-modal-footer">
                <textarea rows="4" cols="50" name="mail_content">Hi <?php echo $candidate->profile_name;?></textarea><br/>
                <input type="hidden" name="mail_to" value="<?php echo $candidate->matrimony_id; ?>">
                <button type='button' id='send_form_btns' proc_id="<?php echo $candidate->profile_id; ?>" matr_id="<?php echo $candidate->matrimony_id; ?>" class='wed-view send_form_btn'>Send Message</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>

        <?php } } 
        else {?>
        <div class="wed-search-listing">
            <ul>
              <li class="no_records">No Records Found..!</li>
            </ul>   
        </div>
        <?php } ?>

		</div> <?php } else {?><div class="wed-search-listing">
					<ul>
					  <li class="no_records">No Matches Found..!</li>
					</ul>   
				</div><?php }?>
        </div>
      </div>
    </div>
  </div>

      <div class="modal fade wed-add-modal" id="reglog" role="dialog">
        <div class="modal-dialog wed-add-modal-dialogue">
          <div class="modal-content wed-add-modal-content">
            <div class="modal-body  wed-add-modal-body">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Want to view complete profile?</h4>
              <p>Register right away and get access to any profiles</p>
            <div class="wed-add-modal-footer">
                <a href="<?php echo base_url(); ?>/home"><li>Register</li></a>
                <a href="<?php echo base_url(); ?>/home"><li>Login</li></a>
              </div>

            </div>

          </div>
        </div>
      </div>

<script>
$(document).ready(function(){

  /*$(".wed-btn-view").click(function() {
      console.log($('.create:checked').map(function() {return this.value;}).get().join(','));
        if($('#filter_form').parsley().validate()) {

            var value =$("#filter_form").serialize();
            var
            window.location.href= base_url+"search/?"+value;
            //window.location.href= base_url+"search/?"+value;
      }
  });*/

 /* var drop_age_min = 0;
  var drop_age_max =0;
  var drop_height_min = 0;
  var drop_height_max =0;
  var drop_income_range = 0;
  p_create = new Array();

  $(".wed-btn-view").click(function() {
        var attrib = $(this).attr('my_attr');
        var drop_atr = $(this).attr('my_drop');
        var passdata_2 = "";

        if($("input[name='"+attrib+"[]']").is(":checked")) {
                p_create = $('input:checked').map(function(){ return $(this).val(); }); }
            else {
                p_create = $('input:checked').map(function(){ return $(this).val(); }); }

        if(drop_atr="age") {
          drop_age_min = $('select[name="' + drop_atr + '_min"] option:selected').val();
          drop_age_max = $('select[name="' + drop_atr + '_max"] option:selected').val();
          if(drop_age_min != 0 && drop_age_max != 0)
          passdata_2 = passdata_2.concat("age_range:"+drop_age_min+"-"+drop_age_max)
        }
        if(drop_atr="height") {
          drop_height_min = $('select[name="' + drop_atr + '_min"] option:selected').val();
          drop_height_max = $('select[name="' + drop_atr + '_max"] option:selected').val();
          if(drop_height_min != 0 && drop_height_max != 0)
          passdata_2 = passdata_2.concat(",height_range:"+drop_height_min+"-"+drop_height_max)
        }
        if(drop_atr="income") {
          drop_income_range = $('select[name="' + drop_atr + '"] option:selected').val();
          if(drop_income_range != 0)
          passdata_2 = passdata_2.concat(",income_range:"+drop_income_range)
        }
        //passdata_2 = "age_min="+drop_age_min+",age_max="+drop_age_max+",height_from="+drop_height_min+",height_to"+drop_height_max+",income"+drop_income_range;
        getAdvSearch(attrib,p_create,passdata_2);
  });*/

    chk_arr = new Array("mart","religion","mother","caste","country","state","misc_type","photo","create");
    chk_arr.forEach(function(entry) {
      myvar = getURLParameter(entry);
     // alert(entry+"="+myvar);
      $("."+entry+".check_"+myvar).attr("checked", true);
    });

$(document).on("click",".send_form_btn",function() {
    var matri_id = $(this).attr('proc_id');
    var o_matri_id = $(this).attr('matr_id');
    var value =$("#send_form_"+matri_id).serialize();

    $.ajax({
        type: "POST",
        url: base_url+'profile/send_mail',
        data: value,
        error: function (err) {
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success: function(data) {
          $('#send_mail_'+matri_id).modal('hide');
          data = JSON.parse(data);

            if(data == "success") {
              //$.post(base_url+"Verify/intrest_success", { matri_id: matri_id }, function(data) { });
              //var main_msg ="Your Mail has been sent to "+proc_name+"'s [T"+matri_id+"].";
              //var sub_msg ="Wait for "+proc_name+" responce.";
              alert("Message Sent to T"+o_matri_id);
            } else {
              //var main_msg ="Sorry, Your Send Mail Limit Exceeded";
              //var sub_msg ="Upgrade your profile to send Unlimited Mails";
              alert("Sorry, Your Send Mail Limit Exceeded.Upgrade your profile to send Unlimited Mails");
            }
            //var modal = showSendMailModal(main_msg,sub_msg,matri_id);
            //$('body').appendTo(modal);
            //$('#common-modal2-'+matri_id).modal('show');
        }
    });
});

});

  function getAdvSearch(attrib,p_create,passdata_2) { /* Record Fetching */
    //JSON.stringify(filter.get()
    if(passdata_2 !="") { passdata_2 = '&range='+passdata_2; }

      var passdata_1 = '?filters='+ JSON.stringify(p_create.get())+passdata_2 ;
          passdata_1 = (passdata_1.replace(/['"]+/g, ''));
      window.location.href= base_url+"search/"+passdata_1;
  }

  function getURLParameter(name) {
    var reslt = decodeURIComponent((new RegExp('[?|&]' + name + '[]=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
    return reslt;
   /* name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, "%20"));*/
  }

  function showSendMailModal(main_msg,sub_msg,matri_id) {
    var modal='<div class="modal fade wed-add-modal" id="common-modal2-'+matri_id+'" role="dialog"> <div class="modal-dialog wed-add-modal-dialogue"> <div class="modal-content wed-add-modal-content"> <div class="modal-body wed-add-modal-body"> <button type="button" class="close" data-dismiss="modal">&times;</button> <h4>'+main_msg+'</h4> <p>'+sub_msg+'</p><div class="wed-add-modal-footer"><a href="" data-dismiss="modal">Close</a></div></div></div></div></div>';
    return modal;
}



//FOR COLOR CHANGE OF LIST ICONS
$(".list_icon1").attr('src',"<?php echo base_url(); ?>/assets/images/list_icon1.png");
$(".list_icon1").click(function(){
    $(".list_icon1").attr('src',"<?php echo base_url(); ?>/assets/images/list_icon1.png");
    $(".list_icon2").attr('src',"<?php echo base_url(); ?>/assets/images/list_icon4.png");
});
$(".list_icon2").click(function(){
    $(".list_icon2").attr('src',"<?php echo base_url(); ?>/assets/images/list_icon3.png");
    $(".list_icon1").attr('src',"<?php echo base_url(); ?>/assets/images/list_icon2.png");
});

//FOR COLOR CHANGE OF LIST ICONS
// $(".list_icon1").addClass("icon_color");
// $(".list_icon1").click(function(){
//    alert("Hai");
//     $(".list_icon1").addClass("icon_color");
//     $(".list_icon2").removeClass("icon_color");
// });
// $(".list_icon2").click(function(){
//     $(".list_icon2").addClass("icon_color");
//     $(".list_icon1").removeClass("icon_color");
// });


 function toggleIcon(e) {
      $(e.target)
          .prev('.wed-filter-heading')
          .find(".more-less")
          .toggleClass('glyphicon-plus glyphicon-minus');
          
  }
  $('.wed-filter-collapse').on('hidden.bs.collapse', toggleIcon);
  $('.wed-filter-collapse').on('shown.bs.collapse', toggleIcon);


 $('button').on('click',function(e) {
      if ($(this).hasClass('grid-btn')) {
          $('.wed-search-listing ul').removeClass('list').addClass('grid');
      }
      else if($(this).hasClass('list-btn')) {
          $('.wed-search-listing ul').removeClass('grid').addClass('list');
      }
  });

/*-------Tooltip for mobile no & print--------*/
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
/*------------------------------------------- */

$(document).on("click","#print",function() {
  window.print();
});
</script>
