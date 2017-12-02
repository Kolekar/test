	<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        View Staff Details
      </h1>
          <br><div> 
<!-- <a href="<?php echo base_url(); ?>Staff/add_super_admin"><button class="btn add-new" type="button"><b><i class="fa fa-fw fa-plus"></i> Add New</b></button></a> -->
    </div>

      <ol class="breadcrumb">
         <li><a href="#"><i class=""></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Staff/view_staff">View Staff Details</a></li>
         <li class="active">View Super Admin Details</li>
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
               <div class="box-header">
                  <h3 class="box-title">View Super Admin Details</h3>
               </div>
               <!-- /.box-header -->
       
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
                         
                           <th>Email</th>	
                          <!-- <th>Created Date</th>-->                                                                              
                           <th width="200px;">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                       <?php
                           foreach($data as $admin) {	
						  // $image=$sub->image;

                           ?>
                        <tr>
                           <td class="hidden"><?php echo $admin->user_id; ?></td>
                           <td class="center"><?php echo $admin->email; ?></td>
                          <!-- <td class="center"><?php echo $admin->created_date; ?></td>-->

                        
                           <td class="center">	                                                   		  
                            <!--  <a class="btn btn-sm bg-olive show-subcatgetdetails" href="javascript:void(0);" data-id="<?php echo $sub->id; ?>">
                              <i class="fa fa-fw fa-eye"></i> View </a>	 -->
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url('Staff/edit_super_admin/'.$admin->user_id); ?>">
                              <i class="fa fa-fw fa-edit"></i>Edit</a>
                              <a class="btn btn-sm btn-danger" href="<?php echo base_url('Staff/delete_super_admin/'.$admin->user_id); ?>" onClick="return doconfirm()">
                              <i class="fa fa-fw fa-trash"></i>Delete</a>							
                           </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                    
                  </table>
               </div>
              
               <!-- /.box-body -->
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
            <h4 class="modal-title">View Subcategory Details</h4>
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
