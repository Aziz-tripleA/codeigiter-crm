


<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('add_new_user')?></h1>
            <small><?php echo display('add_new_user')?></small>
            
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
            <div  class="panel panel-bd panel-form">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <h4><?php echo display('add_new_user')?> </h4>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="portlet-body form">

                        <?php 
                           
                            $attributes = array('class' => 'form-horizontal');
                            echo form_open_multipart('admin/Users_controller/save_user', $attributes);                
                         ?>
                        
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger">*</span> Full Name :</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" required value="<?php echo set_value('name'); ?>" placeholder="Full Name"> 
                                        <span class="text-danger" ><?php echo form_error('name'); ?> </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger">*</span> Email:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="email" required value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email"> 
                                        <span class="text-danger" ><?php echo form_error('email'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger">*</span> Password:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="password" required value="<?php echo set_value('password'); ?>" class="form-control" > 
                                        <span class="text-danger" ><?php echo form_error('password'); ?></span>
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Birth Date:</label>
                                    <div class="col-md-6">
                                       <input type="text" name="birth_date" value="<?php echo html_escape(@$old->birth_date); ?>" required class="form-control datepicker1 birth_date"  placeholder="yyyy-mm-dd">
                                    </div>
                                    
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger">*</span> Phone:</label>
                                    <div class="col-md-6">
                                        <input type="text"  name="phone" value="<?php echo set_value('phone'); ?>" class="form-control" placeholder="Phone"> 
                                        <span class="text-danger" ><?php echo form_error('phone'); ?></span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger">*</span> Gender</label>
                                    <div class="col-md-6">
                                        <div class="md-radio-inline">
                                            <div class="md-radio">
                                                <input type="radio" id="checkbox2_5" name="gender" required value="Male" class="md-radiobtn">
                                                <label for="checkbox2_5">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Male
                                                </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="checkbox2_10" name="gender" required value="Female" class="md-radiobtn">
                                                <label for="checkbox2_10">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Female 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Blood Group :</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="blood_group">
                                            <option value=''>--Select Blood Group--</option>
                                            <option value='A+'>A+</option>
                                            <option value='A-'>A-</option>
                                            <option value='B+'>B+</option>
                                            <option value='B-'>B-</option>
                                            <option value='O+'>O+</option>
                                            <option value='O-'>O-</option>
                                            <option value='AB+'>AB+</option>
                                            <option value='AB-'>AB-</option>
                                            <option value='Unknown'>Unknown</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                <label class="col-md-3 control-label"><span class="text-danger">*</span>Address:</label>
                                    <div class="col-md-6">
                                         <textarea name="address" class="form-control" required="" > <?php echo html_escape(@$old->address); ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Picture:</label>
                                    <div class="col-md-6">
                                        <input type="file" name="picture">       
                                    </div>
                                </div>
                            </div>

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


