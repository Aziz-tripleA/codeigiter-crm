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
            <div class="panel panel-bd">
                <div class="panel-heading ">
                    <div class="panel-title">
                        <h4><?php echo display('profile');?></h4>
                    </div>
               </div>

                <div class="panel-body">
                    <div class="portlet-body form">
                        <?php 
                            $execption = $this->session->flashdata('execption');
                            $mag = $this->session->flashdata('message');

                            if($mag !=''){
                                echo htmlspecialchars_decode($mag);
                            }

                            if($execption !=''){
                                echo '<div class="alert alert-danger">'.htmlspecialchars_decode($execption).'</div>';
                            }

                            $attributes = array('class' => 'form-horizontal','name'=>'d_info','role'=>'form');
                            echo form_open_multipart('admin/Doctor_controller/update_profile', $attributes);                
                         ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger"> * </span> Name </label>
                                    <div class="col-md-7">
                                        <input type="text" name="name" class="form-control" value="<?php echo html_escape($doctor_info->doctor_name); ?>"  placeholder="<?php echo display('doctor_name');?>" required=""> 
                                        <?php echo form_error('name', '<div class=" text-danger">', '</div>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger"> * </span>Password</label>
                                    <div class="col-md-7">
                                    <input type="password" name="password" value="" class="form-control" placeholder="password" required=""> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger"> * </span><?php echo display('designation');?></label>
                                    <div class="col-md-7">
                                    <input type="text" name="designation" value="<?php echo html_escape($doctor_info->designation); ?>" class="form-control" placeholder="<?php echo display('designation');?>" required=""> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('degrees');?></label>
                                    <div class="col-md-7">
                                        <input type="text" name="degree" value="<?php echo html_escape($doctor_info->degrees); ?>" class="form-control" placeholder="<?php echo display('degrees');?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"> <span class="text-danger"> * </span> <?php echo display('department');?> </label>
                                    <div class="col-md-7">
                                        <input type="text" name="department" value="<?php echo html_escape(@$doctor_info->department); ?>" class="form-control" placeholder="<?php echo display('department');?>" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('specialist');?></label>
                                    <div class="col-md-7">
                                        <input type="text" name="specialist" value="<?php echo html_escape($doctor_info->specialist); ?>" class="form-control" placeholder="<?php echo display('specialist');?>" > 
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('doctor_experience');?></label>
                                    <div class="col-md-7">
                                        <input type="text" name="doctor_exp" value="<?php echo html_escape($doctor_info->doctor_exp); ?>" class="form-control" placeholder="<?php echo display('doctor_experience');?>"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('service_place');?></label>
                                    <div class="col-md-7">
                                        <input type="text" name="service_place" value="<?php echo html_escape($doctor_info->service_place); ?>" class="form-control" placeholder="<?php echo display('service_place');?>"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('html_escape(');?></label>
                                    <div class="col-md-7">
                                       <input type="text" requeird name="birth_date" value="<?php echo html_escape($doctor_info->birth_date); ?>"  class="form-control datepicker1" placeholder="<?php echo display('date_placeholder');?>">
                                     </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger"> * </span><?php echo display('phone_number');?></label>
                                    <div class="col-md-7">
                                        <input type="text" required  name="phone" value="<?php echo html_escape($doctor_info->doctor_phone); ?>" class="form-control" placeholder="<?php echo display('phone_number');?>" required=""> 
                                     <?php echo form_error('phone', '<div class=" text-danger">', '</div>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger">*</span><?php echo display('sex');?><?php echo display('sex');?></label>
                                    <div class="col-md-7">
                                        <div class="md-radio-inline">
                                            <div class="md-radio">
                                                <input type="radio" id="checkbox2_5" <?php echo (html_escape($doctor_info->sex)=='Male')?'checked':'' ?> name="gender" value="Male" class="md-radiobtn">
                                                <label for="checkbox2_5">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> <?php echo display('male');?>
                                                </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="checkbox2_10" name="gender" value="Female" <?php echo ($doctor_info->sex=='Female')?'checked':'' ?> class="md-radiobtn">
                                                <label for="checkbox2_10">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> <?php echo display('female');?> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('blood_group');?> </label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="blood_group">

                                            <option value=''>--Select Blood Group--</option>
                                            <option value='A+' <?php echo (html_escape(@$doctor_info->blood_group)=='A+'?'selected':'');?>>A+</option>
                                            <option value='A-' <?php echo (html_escape(@$doctor_info->blood_group)=='A-'?'selected':'');?>>A-</option>
                                            <option value='B+' <?php echo (html_escape(@$doctor_info->blood_group)=='B+'?'selected':'');?>>B+</option>
                                            <option value='B-' <?php echo (html_escape(@$doctor_info->blood_group)=='B-'?'selected':'');?>>B-</option>
                                            <option value='O+' <?php echo (html_escape(@$doctor_info->blood_group)=='O+'?'selected':'');?>>O+</option>
                                            <option value='O-' <?php echo (html_escape(@$doctor_info->blood_group)=='O-'?'selected':'');?>>O-</option>
                                            <option value='AB+' <?php echo (html_escape(@$doctor_info->blood_group)=='AB+'?'selected':'');?>>AB+</option>
                                            <option value='AB-' <?php echo (html_escape(@$doctor_info->blood_group)=='AB-'?'selected':'');?>>AB-</option>

                                        </select>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('address');?></label>
                                    <div class="col-md-7">
                                        <textarea name="address" value="<?php echo html_escape($doctor_info->address); ?>" 
                                            class="form-control"><?php echo html_escape($doctor_info->address); ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('about_me');?></label>
                                    <div class="col-md-7">
                                        <textarea name="about_me" value="<?php echo html_escape($doctor_info->about_me); ?>" class=" form-control" rows="4"> <?php echo html_escape($doctor_info->about_me); ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('picture');?></label>
                                    <div class="col-md-7">
                                        <img src="<?php echo html_escape($doctor_info->picture);?>" width="200px"> 
                                        <input type="file" name="picture"> 
                                    </div>
                                </div>

                                <input type='hidden' name="log_id" value="<?php echo html_escape($doctor_info->log_id); ?>">
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


