
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('send_custom_email')?></h1>
            <small><?php echo display('send_custom_email')?></small>
            
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
            <div  class="panel panel-bd panel-form">

                <div class="panel-heading ">
                        <div class="panel-title">
                            <h4><?php echo display('send_custom_email');?></h4>
                        </div>
                    </div>
                <div class="panel-body">
                    <div class="portlet-body form">
                    
                    <?php 
                        $attributes = array('class' => 'form-horizontal','id' => 'MyForm','role'=>'form');
                        echo form_open_multipart('admin/email/Email/send_custom_email', $attributes);  
                    ?>
                        
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label"><spen class='text-danger'>*</spen> <?php echo display('reciver_email')?> : </label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" required="1" name="to" autocomplete="off" placeholder="<?php echo display('reciver_email')?>">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-2 control-label"> <spen class='text-danger'>*</spen> <?php echo display('subject')?> : </label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" required="1" name="subject" autocomplete="off" placeholder="<?php echo display('subject')?>">
                                </div>
                            </div>

                            <div class="form-group view_tmp">
                                <label class="col-md-2 control-label"> <spen class='text-danger'>*</spen><?php echo display('email_template')?> : </label>
                                <div class="col-md-10">
                                     <textarea name="template" required="1" class="form-control" rows="6"></textarea>
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


