

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('edit_emergency_stop')?></h1>
            <small><?php echo display('edit_emergency_stop')?></small>
            
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-sm-12">
            <div  class="panel panel-default panel-form">
                <div class="panel-body">
                    <div class="portlet-body form">

                        <?php 
                          $message = $this->session->flashdata('message');
                            if($message){
                               echo htmlspecialchars_decode($message);
                            } 
                            $attributes = array('class' => 'form-horizontal','name'=>'stop_info','role'=>'form');
                            echo form_open('admin/Emergency_stop_controller/save_edit_emergency_stop',$attributes);                
                        ?>
                        
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">  <?php echo display('stop_date');?> :</label>
                                    <div class="col-md-7">
                                        <input type="text" value="<?php echo html_escape($stop_info->stop_date); ?>" name="stop_date" class="form-control datepicker1" placeholder="yyyy-mm-dd">
                                    <?php echo form_error('stop_date', '<div class=" text-danger">', '</div>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"> <?php echo display('schedule_date');?> :</label>
                                    <div class="col-md-7">
                                        <input type="text" value="<?php echo html_escape($stop_info->schedul_date); ?>" name="schedul_date" placeholder="yyyy-mm-dd" class="form-control datepicker1">
                                        <?php echo form_error('schedul_date', '<div class="  text-danger">', '</div>'); ?>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="col-md-3 control-label"> <?php echo display('message');?> :</label>
                                    <div class="col-md-7">
                                         <textarea name="message" class=" form-control"><?php echo html_escape($stop_info->message); ?></textarea>
                                         <?php echo form_error('message', '<div class=" text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                                <input type="hidden" name="stop_id" value="<?php echo  html_escape($stop_info->stop_id);?>">
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-success"><?php echo display('update');?></button>
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

