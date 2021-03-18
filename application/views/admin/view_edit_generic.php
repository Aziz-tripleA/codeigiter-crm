<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('edit_generic')?></h1>
            <small><?php echo display('edit_generic')?></small>
            
        </div>
    </section>


    <!-- Main content -->
    <section class="content">
                 <div class="row">

             <?php 
                $attributes = array( 'class' => 'form-horizontal','name'=>'n_p');
                echo form_open_multipart('admin/Generic_controller/update_generic', $attributes);
             ?>
                    <div class="col-md-12">
                        <div  class="panel panel-default panel-form">
                            <div class="panel-body">
                                <div class="portlet-body form">
                        <!--  -->
                        <!-- patinet info -->
                        <!--  -->
                            <div class="portlet-title">
                                <div class="row">
                                        <div class="col-md-8 col-xs-12">
                                            <div class="caption">
                                                <span class="caption-subject font-green sbold uppercase">Name : </span><?php echo html_escape(@$pres->patient_name);?>,&nbsp&nbsp&nbsp
                                                <span class="caption-subject font-green sbold uppercase">Age : </span>
                                                <?php
                                                    $date1=date_create(@$pres->birth_date);
                                                    $date2= date_create( date('y-m-d'));
                                                    $diff=date_diff($date1,$date2);
                                                    echo @$diff->format("%Y-Y:%m-M:%d-D");
                                                  ?>,&nbsp&nbsp&nbsp 
                                                <span class="caption-subject font-green sbold uppercase">Sex : </span><?php echo html_escape(@$pres->sex);?>,&nbsp&nbsp&nbsp
                                                <span class="caption-subject font-green sbold uppercase">Id : </span><?php echo html_escape(@$pres->patient_id);?>,&nbsp&nbsp&nbsp
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <select class="form-control" name="venue_id" required>
                                                <option value="">--Select Chamber--</option>
                                                <?php foreach($venue as $v_enue){
                                                echo '<option  value="'. html_escape($v_enue->venue_id).'">'.html_escape($v_enue->venue_name).'</option>';
                                                 } ?>
                                            </select>  
                                        </div>

                                </div> <hr/>

                                <input type="hidden" name="prescription_id" value="<?php echo html_escape($pres->prescription_id);?>">
                                <input type="hidden" name="appointment_id" value="<?php echo html_escape($pres->appointment_id);?>">
                                <input type="hidden" name="patient_id" value="<?php echo html_escape($pres->patient_id);?>">
                                <input type="hidden" name="doctor_id" value="<?php echo html_escape($pres->doctor_id);?>">


                                    <div class="portlet-title">
                                         <div class="form-group ">
                                            <div class="col-md-6"><input type="text" class="form-control" value="<?php echo html_escape(@$pres->problem);?>"  placeholder="<?php echo display('patient_cc')?>" name="Problem" /></div>
                                            <div class="col-md-2"><input type="text" class="form-control" value="<?php echo html_escape(@$pres->weight);?>"  placeholder="<?php echo display('patient_weight')?>" name="Weight" value=""/></div> 
                                            <div class="col-md-2"><input type="text" class="form-control" value="<?php echo html_escape(@$pres->pressure);?>" placeholder="<?php echo display('patient_bp')?>" name="Pressure"  value=""/></div>
                                            <div class="col-md-2"><input type="text" class="form-control" value="<?php echo html_escape(@$pres->temperature);?>" placeholder="<?php echo display('temperature')?>" name="temperature"  value=""/></div>
                                        </div>
                                    </div><hr/>

                                    <div class="portlet-title">
                                         <div class="form-group ">
                                            <div class="col-md-4"><input type="text" class="form-control" value="<?php echo html_escape(@$pres->history);?>" placeholder="<?php echo display('history')?>" name="history" /></div>
                                            <div class="col-md-4"><input type="text" class="form-control" value="<?php echo html_escape(@$pres->oex);?>" placeholder="<?php echo display('oex')?>" name="oex" /></div>
                                            <div class="col-md-4"><input type="text" class="form-control" value="<?php echo html_escape(@$pres->pd);?>" placeholder="<?php echo display('pd')?>" name="pd" value=""/></div> 
                                        </div>
                                    </div>
                        </div>

            <!-- END PATIENT AREA -->

                            <div class="portlet-title">
                                <div class="row">
                                    <!--  -->
                                       <!-- Madicine area -->
                                    <!-- -->
                                            <div class="col-sm-12 col-xs-12">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr> 
                                                            <td colspan="6" class="m_add_btn"><?php echo display('medicine')?> <a href="javascript:void(0);"  class="btn btn-primary add_button pull-right" title="Add field"> <span class="glyphicon glyphicon-plus"></span><?php echo display('add')?></a></td>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="field_wrapper">
                                                                <?php foreach($m_info as $medicine){?>
                                                                    <div class="form-group ">
                                                                         <div class="col-md-1 col-xs-12">
                                                                            <input type="text"  class="form-control" name="type[]"  value="<?php echo $medicine->medicine_type?>" />
                                                                            
                                                                        </div>
                                                                         <div class="col-md-3">
                                                                            <input type="hidden" class="mdcn_value" name="group_id[]" value="<?php echo html_escape($medicine->group_id)?>" id="search-group_id" />
                                                                            <input type="text"  class="group_name form-control"  name="group_name[]" id="search-group" autocomplete="off" value="<?php echo html_escape($medicine->group_name)?>" />
                                                                            <div id="suggesstion-box"></div>
                                                                            
                                                                         </div>

                                                                         <div class="col-md-2" ><input type="text"  class="form-control"  value="<?php echo html_escape($medicine->mg)?>" name="mg[]" /></div> 
                                                                         <div class="col-md-1" ><input type="text"  class="form-control"  value="<?php echo html_escape($medicine->dose)?>" name="dose[]"  /></div>
                                                                         <div class="col-md-1"><input type="text"  class="form-control"  value="<?php echo html_escape($medicine->day)?>" name="day[]"  /></div>
                                                                         <div class="col-md-3"><input type="text"  class="form-control"  value="<?php echo html_escape($medicine->medicine_com)?>" name="comments[]"  /></div> 
                                                                        <a href="javascript:void(0);" class=" btn btn-danger remove_button" title="Remove field"><span class="glyphicon glyphicon-trash"></span></a>
                                                                    </div> 

                                                                <?php }?>
                                                     
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6">
                                                                <div class="form-group col-md-12">
                                                                    <textarea  name="prescription_comment" class="form-control" rows="2"><?php echo html_escape(@$pres->pres_comments);?></textarea>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                <!-- -->
                                <!-- start Test area  -->
                                <!-- -->
                                            <div class="col-sm-6 col-xs-12">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr> 
                                                             <td colspan="6" class="t_add_btn"><?php echo display('test')?> 
                                                                <a href="javascript:void(0);"  class="btn btn-primary add_button1 pull-right" title="Add field"><span class="glyphicon glyphicon-plus"></span><?php echo display('add')?></a>
                                                             </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <tr>
                                                                <td> 
                                                                    <div class="field_wrapper1">
                                                                    <?php foreach($t_info as $test){?>
                                                                    <div id="count_test1">
                                                                        <div class="form-group ">
                                                                            <div class="col-md-5">
                                                                                <input type="hidden" class="test_value" name="test_name[]" value="<?php echo html_escape($test->test_id)?>" />
                                                                                <input value="<?php echo html_escape($test->test_name)?>"   class="test_name form-control" name="te_name[]" autocomplete="off" >
                                                                                <div id="test-box"></div>
                                                                            </div>
                                                                            <div class="col-md-5"> 
                                                                                <input value="<?php echo html_escape($test->test_assign_description)?>" name="test_description[]" class="form-control" >
                                                                            </div>
                                                                                <a href="javascript:void(0);" class=" btn btn-danger remove_button" title="Remove field"><span class="glyphicon glyphicon-trash"></span></a>
                                                                        </div>
                                                                    </div>
                                                                    <?php }?>
                                                                    </div>

                                                                </td>
                                                            </tr>
                                  
                                                    </tbody>
                                                </table>
                                            </div>

                                    <!--  -->
                                    <!-- Advice area  -->
                                    <!--  -->
                                            
                                            <div class="col-sm-6 col-xs-12">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr> 
                                                             <td colspan="6" class="a_btn"><?php echo display('advice')?> 
                                                                <a href="javascript:void(0);"  class="btn btn-primary add_advice pull-right" title="Add field"><span class="glyphicon glyphicon-plus"></span><?php echo display('add')?></a>
                                                             </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="field_wrapper2">
                                                                <?php foreach($a_info as $advice){?>
                                                                    <div id="count_advice1">
                                                                        <div class="form-group ">
                                                                            <div class="col-md-10">
                                                                                <input type="hidden" class="advice_value" name="advice[]" value="<?php echo html_escape($advice->advice_id)?>"/>
                                                                                <input value="<?php echo $advice->advice?>" class="advice_name form-control" name="adv[]" autocomplete="off" >
                                                                                <div  id="advice-box"></div>
                                                                            </div><a href="javascript:void(0);" class=" btn btn-danger remove_button" title="Remove field"><span class="glyphicon glyphicon-trash"></span></a>
                                                                        </div>
                                                                    </div>
                                                                <?php }?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-offset-9 col-sm-6">
                                                <button type="reset" class="btn btn-danger"><?php echo display('reset')?></button>
                                                <button type="submit" class="btn btn-success"><?php echo display('submit')?></button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                 </form>
        </div>
    </section>

</div>    



<?php $this->load->view('admin/admin_script/edit_generic.php');?>