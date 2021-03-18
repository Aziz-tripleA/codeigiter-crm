
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('edit_clinic'); ?></h1>
            <small><?php echo display('edit_clinic'); ?></small>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
        <!--  form area -->
            <div class="col-sm-12">

                <?php
                    $msg = $this->session->flashdata('message');
                    if ($msg !='') {
                        echo htmlspecialchars_decode($msg);
                    }
                    if ($this->session->flashdata('exception')!="") {
                        echo $this->session->flashdata('exception');
                    }

                    if (validation_errors()) {
                        echo '<div class="alert alert-danger">'.validation_errors().'</div>';
                    }

                ?>


                <div  class="panel panel-bd panel-form">

                    <div class="panel-heading ">
                        <div class="panel-title" >
                            <h4><?php echo display('edit_clinic'); ?></h4>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="portlet-body form">


                            <?php
                                $attributes = array('role'=>'form');
                                echo form_open_multipart('admin/Clinic_controller/save_edit_clinic', $attributes);
                            ?>
                        
                            
                            <div class="form-body">


                            <input type="hidden" value="<?= $clinic->id  ?>" name="clinic_id">
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label class=" control-label"><span class="text-danger">*</span> <?php echo display('clinic_name')?> </label>
                                    <div class="">
                                        <input type="text"   required name="clinic_name" class="form-control" value="<?php echo html_escape(@$clinic->clinic_name);?>"  placeholder="<?= display('clinic_name') ?>" > 
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" control-label"><span class="text-danger">*</span> <?php echo display('clinic_address')?> </label>
                                    <div class="">
                                        <input type="text" name="clinic_address" class="form-control" value="<?php echo html_escape(@$clinic->clinic_address);?>"  placeholder="<?= display('clinic_address') ?>" > 
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label"> <?php echo display('clinic_phone')?> </label>
                                    <div class="">
                                        <input type="text" value="<?= html_escape(@$clinic->phone_number) ?>" class="form-control" name="clinic_phone" placeholder="<?= display('clinic_phone')  ?>" > 
                                    </div>
                                </div>

                            </div>



                                <div class="row">
                                   
                                    <div class="form-group row ">
                                        <div class="col-offes-3 col-md-4" >
                                            <button type="reset" class="btn btn-danger"><?php echo display('reset')?></button>
                                            <button type="submit" class="btn btn-success"><?php echo display('submit')?></button>
                                        </div>
                                    </div>
                                
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


