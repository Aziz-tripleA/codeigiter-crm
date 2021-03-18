<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('profile');?></h1>
            <small><?php echo display('profile');?></small>
            
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <!--  form area -->
        <div class="col-sm-12">

            <?php 
                $mag = $this->session->flashdata('message');
                  if($mag !=''){
                      echo htmlspecialchars_decode($mag);
                }
            ?>
            <?php 
                $execption = $this->session->flashdata('execption');
                  if($execption !=''){
                      echo htmlspecialchars_decode($execption);
                }
            ?>
            <div class="panel panel-bd">
                <div class="panel-heading ">
                    <div class="panel-title">
                        <h4><?php echo display('profile');?></h4>
                    </div>
               </div>

                <div class="panel-body">
                    <div class="portlet-body form">
                        <?php 
                            
                            $attributes = array('class' => 'form-horizontal','name'=>'d_info','role'=>'form');
                            echo form_open_multipart('admin/Basic_controller/update_profile', $attributes);                
                         ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger"> * </span> Name </label>
                                    <div class="col-md-7">
                                        <input type="text" name="name" class="form-control" value="<?php echo html_escape($doctor_info->doctor_name); ?>" placeholder="<?php echo display('doctor_name');?>" required> 
                                     <?php echo form_error('name', '<div class=" text-danger">', '</div>'); ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('birth_date');?></label>
                                    <div class="col-md-7">
                                       <input type="text" requeird name="birth_date" value="<?php echo html_escape($doctor_info->birth_date); ?>"  class="form-control datepicker1" placeholder="<?php echo display('date_placeholder');?>">
                                     </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger"> * </span><?php echo display('phone_number');?></label>
                                    <div class="col-md-7">
                                        <input type="number" required  name="phone" value="<?php echo html_escape($doctor_info->doctor_phone); ?>" class="form-control" placeholder="<?php echo display('phone_number');?>" required> 
                                     <?php echo form_error('phone', '<div class=" text-danger">', '</div>'); ?>
                                    </div>
                                </div>


                               
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('blood_group');?> </label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="blood_group">
                                            

                                            <option value=''>--<?php echo display('blood_group');?>--</option>
                                            <option value='A+' <?php echo (html_escape($doctor_info->blood_group)=='A+'?'selected':'')?>>A+</option>
                                            <option value='A-' <?php echo (html_escape($doctor_info->blood_group)=='A-'?'selected':'')?>>A-</option>
                                            <option value='B+' <?php echo (html_escape($doctor_info->blood_group)=='B+'?'selected':'')?>>B+</option>
                                            <option value='B-' <?php echo (html_escape($doctor_info->blood_group)=='B-'?'selected':'')?>>B-</option>
                                            <option value='O+' <?php echo (html_escape($doctor_info->blood_group)=='O+'?'selected':'')?>>O+</option>
                                            <option value='O-' <?php echo (html_escape($doctor_info->blood_group)=='O-'?'selected':'')?>>O-</option>
                                            <option value='AB+' <?php echo (html_escape($doctor_info->blood_group)=='AB+'?'selected':'')?>>AB+</option>
                                            <option value='AB-' <?php echo (html_escape($doctor_info->blood_group)=='AB-'?'selected':'')?>>AB-</option>
                                            <option value='Unknown' <?php echo (html_escape($doctor_info->blood_group)=='Unknown'?'selected':'')?>>Unknown</option>
                                        </select>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('address');?></label>
                                    <div class="col-md-7">
                                         <textarea name="address" value="<?php echo html_escape($doctor_info->address); ?>" class="form-control"><?php echo html_escape($doctor_info->address); ?> </textarea>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('picture');?></label>
                                    <div class="col-md-7">
                                        <img src="<?php echo html_escape($doctor_info->picture);?>" width="200px" > 
                                            
                                        <input type="file" name="picture"> 
                                    </div>
                                </div>

                                <input type='hidden' name="doctor_id" value="<?php echo html_escape($doctor_info->doctor_id); ?>">
                                <input type='hidden' name="image" value="<?php echo html_escape($doctor_info->picture); ?>">
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-success"><?php echo display('submit')?></button>
                                </div>
                            </div>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>            
    </section>
</div>
