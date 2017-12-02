
  <style>
      select { width: 180px !important;display: inline !important; }
     .box-header { height: 60px; }
     .DTTT_container { display: inline !important;float: right !important; }
     .dataTables_length,.dataTables_filter { display: inline !important; }
     .dataTables_filter { float: right !important;margin-right: 20px; }
     .search-div { padding-left: 0px !important; padding-right: 0px !important;margin-top: 0px !important; }
     .search-div button { min-height: 34px; }
     .dataTables_filter input { width: 280px !important; }
   </style>

   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
          View Reports
       </h1>
       <br><div> 
    </div>

    <ol class="breadcrumb">
      <li><a href="#"><i class=""></i>Home</a></li>
      <li><a href="<?php echo base_url(); ?>Packages/view_packages">View Reports</a></li>
      <li class="active">View Reports</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-xs-12">
         <?php
         if($this->session->flashdata('message')) {
            $message = $this->session->flashdata('message');

            ?>
            <div class="alert alert-<?php echo $message['class']; ?>">
               <button class="close" data-dismiss="alert" type="button">×</button>
               <?php echo $message['message']; ?>
            </div>
            <?php
         }
         ?>
      </div>

      <div class="col-xs-12">
         <!-- /.box -->
         <div class="box">

            <div class="box-header col-md-12" style="border-right: 1px solid #ededed;border-bottom: 1px solid #3c8dbc;background: #f9f9f9;">
               <form method="post" action="<?php echo base_url();?>Reports/view_result/search">
               <div class="col-md-11" style="width: auto;">
                
               <select class="form-control" name="member_type">
                     <option>Select Member Type</option>
                     <option selected="selected">All Members</option>
                     <option value="1">Active/Free Members</option>
                     <option value="2">Inactive Members</option>
                     <option value="3">Paid Members</option>
               </select>
                <select class="form-control" name="gender">
                     <option value="">Select Gender</option>
                     <option value="male">Male</option>
                     <option value="female">Female</option>
               </select>
                <select class="form-control cst-select-1" name="country" cst-attr="country" cst-for="city" id="country-selector">
                     <option>Select Country</option>
                     <?php foreach ($countries as $country) { ?>                     
                        <option value="<?php echo $country->country_id; ?>"><?php echo $country->country_name; ?></option>
                     <?php } ?>
               </select>
                <select class="form-control cst-select-1" name="city" cst-attr="city" cst-for="" id="city-selector">
                     <option>Select City</option>
               </select>
                <select class="form-control" name="religion">
                     <option>Select Religion</option>
                     <?php foreach ($religions as $religion) { ?>                     
                        <option value="<?php echo $religion->religion_id; ?>"><?php echo $religion->religion_name; ?></option>
                     <?php } ?>
               </select>
               </div>
               <div class="col-md-1 search-div" style="margin-top: 12px;">
                  <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                  <div class="btn-group pull-right">
                     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#874DA3;min-height: 34px;border-radius: 0px;"><span class="caret"></span>
                     </button>
                     <ul class="dropdown-menu" style="margin-left: -90px;">
                       <!-- <li><a href="<?php echo base_url();?>Reports/view_reports">Generate Graph</a></li> -->
                       <li><a href="<?php echo base_url();?>Reports/view_graph">Signups Graph</a></li>
                       <li role="separator" class="divider"></li>
                       <li><a href="#">Reports</a></li>
                     </ul>
                  </div>
               </div>
             </form>
            </div>

            <!-- <div class="col-md-1">
               <div class="btn-group">
                 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#874DA3;min-height: 34px;border-radius: 0px;"><i class="fa fa-cogs"></i><span class="caret"></span>
                 </button>
                 <ul class="dropdown-menu" style="margin-left: -90px;">
                   <!-- <li><a href="<?php echo base_url();?>Reports/view_reports">Generate Graph</a></li> -->
                   <!-- <li><a href="<?php echo base_url();?>Reports/view_graph">Signups Graph</a></li>
                   <li role="separator" class="divider"></li>
                   <li><a href="#">Reports</a></li>
                 </ul>
               </div>
            </div><br/><br/> -->

<!-- highchart" data-graph-container-before="1" data-graph-type="column" -->


            <!-- /.box-header -->
             <div class="box-body" style="margin-top: 74px !important;">

                    <table id="" class="table table-bordered table-striped datatable1" style="font-size: 15px">
                     <thead>
                        <tr>
                           <th class="hidden">Sl No</th>
                           <th>Name</th>
                           <th>Birth Date</th>
                           <th>Gender</th>
                           <th>Email</th>
                           <th>Phone</th>
                           <!-- <th>Package</th> -->
                           <th>Profile Link</th>
                           <th>Status</th>
                         <!--   <th class="custom-btn-bay">Action</th> -->
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1;
                           foreach($members as $member) { 
                           // $image=$member->image;
                           
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $i; ?></td>
                           <td class="center"><?php echo $member->profile_name; ?></td>
                           <td class="center"><?php echo $member->dob; ?></td>
                           <td class="center"><?php echo $member->gender; ?></td>                   
                           <td class="center"><?php echo $member->email; ?></td>
                           <td class="center"><?php echo $member->phone; ?></td>
                          <!-- <?php foreach($packages as $package) { ?>
                          <td class="center"><?php echo $package->package_name; ?></td>
                          <?php } ?>-->
                           <td class="center ">
                              <a class="btn btn-sm btn-success" href="<?php echo base_url();?>../profile/profile_details/<?php echo $member->matrimony_id; ?>" target="_blank">View Profile</a>
                           </td>
                           <td class="center"><?php 
                               	if($member->profile_status=='0'){
									echo "Rejected";
								}
								else if($member->profile_status=='1'){
									echo "Activated";
								}
								else if($member->profile_status=='2'){
									echo "Deleted";
								}
								else if($member->profile_status=='3'){
									echo "Banned";
								}
								else if($member->profile_status=='4'){
									echo "Deactivated";
								}
                           ?>
                              
                           </td>
                   
                        </tr>
                        <?php $i = $i+1; } ?>
                     </tbody>
                  </table>
               </div>
             
           <!-- /.box -->
        </div>
        <!-- /.col -->
     </div>
     <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<div class="modal fade modal-wide" id="popup-subcatgetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title">View Reports Details</h4>
      </div>
      <div class="modal-subcatbody">
      </div>
      <div class="business_info">
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
   </div>
   <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<script>
$( document ).ready(function() {

$(".cst-select-1").on('change', function () {
        var valueSelected = $(this).val();
        var select_type   = $(this).attr('cst-attr');
        var select_destn  = $(this).attr('cst-for');
        var passdata_2 = 'sel_val='+ valueSelected +'&sel_typ='+select_type;

        $.ajax({
        type: "POST",
        url : '<?php echo base_url(); ?>reports/get_drop_data',
        data:  passdata_2,
        success: function(data){
          //alert(data);
               $("#"+select_destn+"-selector").html(data);
            }
        });
    });
 });
</script>
