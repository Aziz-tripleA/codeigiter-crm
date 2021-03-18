
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('add_new_'); ?></h1>
            <small><?php echo display('surgeries_create'); ?></small>
           
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
                    echo  '<div class="alert alert-success">'.htmlspecialchars_decode($msg).'</div>' ;
                }
                if ($this->session->flashdata('exception')!="") {
                    echo '<div class="alert alert-info">'.$this->session->flashdata('exception').'</div>';
                }

                if (validation_errors()) {
                    echo '<div class="alert alert-danger">'.validation_errors().'</div>';
                }
            ?>

            <div class="panel panel-bd">

                <div class="panel-heading ">
                    <div class="panel-title" >
                        <h4><?php echo display('surgeries_create');?></h4>
                    </div>
                </div>
               
                <div class="panel-body">
                    <div class="portlet-body form">
                        <?php
                            $attributes = array('role'=>'form');
                            echo form_open('admin/Surgeries_controller/surgery_store', $attributes);
                        ?>
                        
                        <div class="form-body">
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label class=" control-label"> <?php echo display('surgery_title')?> </label>
                                    <div class="">
                                        <input type="text"  name="surgery_title" class="form-control" value="<?php echo html_escape(@$old->surgrey_title);?>"  placeholder="<?= display('surgery_title') ?>" > 
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" control-label"><span class="text-danger">*</span> <?php echo display('surgery_patient')?> </label>
                                    <div class="">
                                    <select name="patient_id" class="form-control" required="">
                                       <option value="">Select Patient</option>
                                       <?php
                
                                       foreach ($patients as $patient) {
                                           ?>
                                       <option  value="<?= $patient->patient_id ?>"><?= $patient->given_name ?></option>
                                       <?php
                                       }
                                       
                                       ?>
                                   </select>
                                   <span class="text-danger"><?php echo form_error('patient'); ?></span>
                                    </div>
                                </div>


                                <div class="form-group col-md-4">
                                    <label class=" control-label"><span class="text-danger">*</span> <?php echo display('surgery_procedure')?> </label>
                                    <div class="">
                                    <select name="procedure_id" class="form-control" required="">
                                       <option value="">Select Procedure</option>
                                       <?php
                
                                       foreach ($procedures as $procedure) {
                                           ?>
                                       <option  value="<?= $procedure->id ?>"><?= $procedure->name ?></option>
                                       <?php
                                       }
                                       
                                       ?>
                                   </select>
                                   <span class="text-danger"><?php echo form_error('procedure'); ?></span>
                                    </div>
                                </div>

                               
                            </div>
                                <br>        
                            <div class="row">
                            
                                <div class="form-group col-md-4">
                                    <label class=" control-label"><span class="text-danger">*</span> <?php echo display('surgery_clinic')?> </label>
                                    <div class="">
                                    <select name="clinic_id" class="form-control" required="">
                                       <option value="">Select Clinic</option>
                                       <?php
                
                                       foreach ($clinics as $clinic) {
                                           ?>
                                       <option  value="<?= $clinic->id ?>"><?= $clinic->clinic_name ?> - <?= $clinic->clinic_address ?></option>
                                       <?php
                                       }
                                       
                                       ?>
                                   </select>
                                   <span class="text-danger"><?php echo form_error('clinic'); ?></span>
                                    </div>
                                </div>


                                <div class="form-group col-md-4">
                                    <label class=" control-label"><?php echo display('surgery_date'); ?></label>
                                    <div class=" ">
                                       <input type="text" name="surgery_date" value="<?php echo html_escape(@$old->surgery_date);?>" class="form-control datepicker1 birth_date"   placeholder="<?php echo display('surgery_date'); ?>" >
                                    </div>
                                    
                                </div>

                                <div class="form-group col-md-4">
                                <label class="control-label"> <?php echo display('surgery_note'); ?></label>
                                    <div class="">
                                        <textarea name="surgery_note"   class="form-control" rows="1" ><?php echo html_escape(@$old->note);?></textarea>
                                    </div>
                                </div>
                            
                            </div>

                 


                            <div class="form-group row">
                                <div class="col-offes-3 col-md-4" >
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
