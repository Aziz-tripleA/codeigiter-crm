
<!-- =============================================== -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon"> <i class="pe-7s-world"></i></div>

                    <div class="header-title">
                        <h1><?php echo display('create_prescription')?></h1>
                        <small><?php echo display('create_prescription')?></small>
                        
                    </div>
                </section>

                <!-- Main content -->
                <div class="content">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                        <?php echo form_open('admin/doctor/Prescription_controller/save_prescription');?>
                            <div class="panel panel-bd prescription-table">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4><?php echo display('name')?> : <?php echo html_escape(@$patient_info->family_name) .' '. html_escape(@$patient_info->given_name) ;?>.
                                         <?php echo display('phone_number')?> : <?php echo html_escape(@$patient_info->patient_phone);?>,
                                        <?php 
                                             $date1 =  date_create(@$patient_info->birth_date);
                                             $newDate = date_format($date1,"d-M-Y");
                                        ?>
                                        DOB : <?php echo html_escape(@$newDate);?>.
                                        <?php echo display('sex')?> : <?php echo html_escape(@$patient_info->sex);?>. Date : <?php echo date("Y-m-d");?> </h4>
                                        <div class="text-right"><a href="<?php echo base_url()?>History_controller/patient_medical_info/<?php echo html_escape(@$patient_info->patient_id);?>" class="btn btn-danger" target="_blank"><i class="ti-alert m-r-5"></i>Click to see patient info</a></div>
                                    </div>
                                </div>

                                <input type="hidden" name="patient_id" value="<?php echo  html_escape(@$patient_info->patient_id);?>">
                                <input type="hidden" name="appointment_id" value="<?php echo  html_escape(@$patient_info->appointment_id)?>">

                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right"><?php echo display('chief_complain')?> :</label>
                                                <div class="col-sm-7">
                                                    <input class="form-control" type="text" name="chief_complain" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="prescription-select">
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <h3><?php echo display('reference_diagnosis')?> :</h3>
                                                <div class="col-sm-3">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label text-right"><?php echo display('language')?></label>
                                                        <div class="col-sm-8">
                                                            <select name="lang_id" class="form-control" onchange="loadeSection()" id="lang_id" required >
                                                                <option value="">--Section--</option>
                                                                <?php foreach($lang as $value){
                                                                echo '<option value="'.html_escape($value->lang_id).'">'.html_escape($value->lang_name).'</option>';

                                                                }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="row">

                                                    <div class="col-sm-3">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label text-right"><?php echo display('section')?></label>
                                                            <div class="col-sm-8">
                                                                <select name="section" required class="form-control section" onchange="loadeDisease()" id="disease">
                                                                    <option selected="selected">--<?php echo display('section')?>--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label text-right"><?php echo display('disease')?></label>
                                                            <div class="col-sm-8">
                                                                <select name="disease" onchange="loadeCategory()" class="disease form-control" required id="speed2">
                                                                    <option selected="selected">--<?php echo display('disease')?>--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label text-right"><?php echo display('category')?></label>
                                                            <div class="col-sm-8">
                                                                <select name="category" class="category form-control" id="speed3" required onchange="loadeClasi()">
                                                                    <option selected="selected">--<?php echo display('category')?>--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group row">
                                                            <label class="col-sm-5 col-form-label text-right"> <?php echo display('classification')?></label>
                                                            <div class="col-sm-7">
                                                                <select name="classific" onchange="loadMedicine()" class="classific form-control" required id="classific">
                                                                    <option selected="selected">--<?php echo display('classification')?>--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-height">
                                        <div class="table-responsive">
                                            <table id="one" class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo display('syndromes')?></th>
                                                        <th><?php echo display('treatment')?></th>
                                                        <th><?php echo display('medicine')?></th>
                                                        <th><?php echo display('action')?></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="medicine_area">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                   // echo json_encode($harbs);
                                ?>
                                <div class="panel-footer">
                                    <div class="table-responsive">
                                    <div class="loder"></div>
                                        <table id="two"  class="table table-hover table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th><?php echo display('medicine')?> <a href="javascript:void(0);"  class="btn btn-success btn-xs m-l-10 addMedicine"><i class="ti-plus m-r-5"></i>Add</a></th>
                                                    <th><?php echo display('herbs')?></th>
                                                    <th><?php echo display('comment')?></th>
                                                    <th><?php echo display('action')?></th>
                                                </tr>
                                            </thead>
                                            <tbody class="harb field_wrapper">
                                               
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"><?php echo display('inspecsion')?> :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="inspecsion" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"><?php echo display('treatment')?> :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="treatment" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"><?php echo display('treatment_plan')?>:</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="tretment_plan" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"><?php echo display('treatment_goals')?> :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="treatment_goals" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"><?php echo display('doctor_told')?> :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="doctor_told">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"><?php echo display('treatment_effect')?>:</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="treatment_effect" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"><?php echo display('treatment_evaluation')?>:</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="treatment_evaluation" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"><?php echo display('referral_doctor')?> :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="referral_doctor" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"><?php echo display('work_injury_insurance')?> :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="work_injury">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"><?php echo display('traffic_accident')?> :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="traffic_accident">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"> <?php echo display('version_number')?> :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="veteran_number">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"><?php echo display('custom_receipt')?> :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="custom_receipt">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"><?php echo display('deaggregate')?> :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="diagnostics">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"><?php echo display('additional_info')?> :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="additional_info">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label text-right"><?php echo display('overall_comment')?> :</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="overall_comment" rows="2"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel-footer text-right">
                                    <button type="reset" class="btn btn-primary"><?php echo display('reset')?></button>
                                    <button type="submit" class="btn btn-success"><?php echo display('submit')?></button>
                                </div>
                            </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div> <!-- /.content -->
            </div> <!-- /.content-wrapper -->




<?php $this->load->view('admin/admin_script/create_prescription.php');?>