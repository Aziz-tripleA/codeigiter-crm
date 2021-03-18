<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('email_configaretion');?></h1>
            <small><?php echo display('email_configaretion');?></small>
            
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
             <?php
                $msg = $this->session->flashdata('message');
                if($msg){
                    echo htmlspecialchars_decode($msg);
                } 
            ?>
            
             <div class="row">
        <div class="col-md-12 ">
            <div  class="panel panel-default panel-form">
                <div class="panel-body">
                    <div class="portlet-body form">
                    
                    <?php 
                        $attributes = array('class' => 'form-horizontal','id' => 'MyForm','role'=>'form');
                        echo form_open_multipart('admin/email/Email/email_config_save', $attributes);  
                    ?>
                        
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-7">
                                    <label>
                                        <input type="checkbox" <?php echo html_escape(@$config->at_appointment)==1?'checked':''?> name="at_appointment"  value="1"><?php echo display('send_at_appointment');?>
                                    </label>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-7">
                                    <label>
                                    <input type="checkbox" <?php echo html_escape(@$config->at_registration)==1?'checked':''?> name="at_registration"  value="1"> <?php echo display('send_at_registration');?>
                                    </label>
                                </div>
                            </div> 


                            <div class="form-group">
                                <label class="col-md-3 control-label"> </label>
                                <div class="col-md-7">
                                    <label>
                                        <input type="checkbox" <?php echo html_escape(@$config->reminder)==1?'checked="checked"':''?> name="reminder"  value="1"> <?php echo display('send_by_reminder');?>
                                    </label>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo display('protocol');?> : </label>
                                <div class="col-md-7">
                                     <input type="text" value="<?php echo html_escape(@$config->protocol);?>" name="protocol" required="1" class="form-control">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo display('mailepath');?> : </label>
                                <div class="col-md-7">
                                     <input type="text" name="mailpath" value="<?php echo html_escape(@$config->mailpath);?>" required="1" class="form-control">
                                </div>
                            </div>


                            <div class=" form-group">
                                    <div class="col-sm-3 control-label"><?php echo display('smtp_port')?>
                                    </div>

                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="smtp_port" id="port" value="<?php echo html_escape(@$config->smtp_port);?>" placeholder="Smtp Port">
                                    </div>
                                </div>

                                <div class=" form-group">
                                    <div class="col-sm-3 control-label">
                                        <?php echo display('smtp_username')?>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" name="smtp_username" id="username" value="<?php echo html_escape(@$config->smtp_username);?>" placeholder="Smtp Username">
                                    </div>
                                </div>

                                <div class=" form-group">
                                    <div class="col-sm-3 control-label"><?php echo display('smtp_password')?>
                                    </div>

                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="smtp_password" value="<?php echo html_escape(@$config->smtp_password);?>" id="password" placeholder="Smtp Password">
                                    </div>

                                </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo display('mailtype');?> : </label>
                                <div class="col-md-7">
                                     <input type="text" name="mailtype" value="<?php echo html_escape(@$config->mailtype);?>" required="1" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> <?php echo display('sender_email');?> : </label>
                                <div class="col-md-7">
                                     <input type="text" name="sender" value="<?php echo html_escape(@$config->sender);?>" required="1" class="form-control">
                                </div>
                            </div>

                        </div>

                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="reset" class="btn btn-danger"><?php echo display('reset')?></button>
                                    <button type="submit" class="btn btn-success"><?php echo display('submit')?></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>  
         </div>
    </div>   
    </section>
</div>




