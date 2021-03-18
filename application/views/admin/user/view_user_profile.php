

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
                    $msg = $this->session->flashdata('message');
                    if($msg !=''){
                        echo htmlspecialchars_decode($msg);
                    }
                    if($this->session->flashdata('exception')!=""){
                        echo $this->session->flashdata('exception');
                    }
            ?>
            <div  class="panel panel-bd">
                <div class="panel-heading ">
                    <div class="panel-title">
                        <h4><?php echo display('Profile');?></h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="portlet-body form">
                        <?php 
                            $attributes = array('class' => 'form-horizontal','name'=>'u_info');
                            echo form_open_multipart('admin/user/Users_controller/save_update_profile', $attributes);                
                         ?>
                        
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger"> * </span> <?php echo display('name');?> </label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" required value="<?php echo html_escape(@$user_info->full_name); ?>" placeholder="<?php echo display('name');?>"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('birth_date');?></label>
                                    <div class="col-md-6 ">
                                       <input type="text" name="birth_date" required  autocomplete="off" class="form-control datepicker1 birth_date" value="<?php echo html_escape(@$user_info->birth_date); ?>" >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label"> <?php echo display('phone_number');?></label>
                                    <div class="col-md-6">
                                        <input type="text"  name="phone" value="<?php echo html_escape(@$user_info->user_phone); ?>" class="form-control" placeholder="<?php echo display('phone_number');?>"> 
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger"> * </span>  <?php echo display('sex');?></label>
                                    <div class="col-md-6">
                                        <div class="md-radio-inline">
                                            <div class="md-radio">
                                                <input type="radio" id="checkbox2_5" name="gender" required value="Male" class="md-radiobtn" <?php echo ($user_info->sex=='Male'?'checked':'')?>>
                                                <label for="checkbox2_5">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> <?php echo display('male');?>
                                                </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="checkbox2_10" name="gender" required value="Female" class="md-radiobtn" <?php echo ($user_info->sex=='Female'?'checked':'')?>>
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
                                    <div class="col-md-6">
                                        <select class="form-control" name="blood_group">
                                            
                                            <option value=''>--Select Blood Group--</option>
                                            <option value='A+' <?php echo (html_escape(@$user_info->blood_group)=='A+'?'selected':'');?>>A+</option>
                                            <option value='A-' <?php echo (html_escape(@$user_info->blood_group)=='A-'?'selected':'');?>>A-</option>
                                            <option value='B+' <?php echo (html_escape(@$user_info->blood_group)=='B+'?'selected':'');?>>B+</option>
                                            <option value='B-' <?php echo (html_escape(@$user_info->blood_group)=='B-'?'selected':'');?>>B-</option>
                                            <option value='O+' <?php echo (html_escape(@$user_info->blood_group)=='O+'?'selected':'');?>>O+</option>
                                            <option value='O-' <?php echo (html_escape(@$user_info->blood_group)=='O-'?'selected':'');?>>O-</option>
                                            <option value='AB+' <?php echo (html_escape(@$user_info->blood_group)=='AB+'?'selected':'');?>>AB+</option>
                                            <option value='AB-' <?php echo (html_escape(@$user_info->blood_group)=='AB-'?'selected':'');?>>AB-</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"> <?php echo display('address');?></label>
                                    <div class="col-md-6">
                                        <textarea name="address" id="editor1" class="form-control"><?php echo html_escape(@$user_info->address); ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo display('picture');?></label>
                                    <div class="col-md-6">
                                        <img src="<?php echo html_escape(@$user_info->picture);?>">
                                        <input type="file" name="picture">       
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="pic" value="<?php echo html_escape(@$user_info->picture);?>">
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                     <button type="reset" class="btn btn-danger"><?php echo display('reset')?></button>
                                    <button type="submit" class="btn btn-success"><?php echo display('submit')?></button>
                                </div>
                            </div>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>            
    </section>
</div>

