
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('add_new_patient'); ?></h1>
            <small><?php echo display('add_new_patient'); ?></small>
            
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
                          echo html_escape($msg);
                      }
                      if ($this->session->flashdata('exception')!="") {
                          echo $this->session->flashdata('exception');
                      }
            ?>
            <div  class="panel panel-bd">

                <div class="panel-heading ">
                    <div class="panel-title" >
                        <h4><?php echo display('edit_patient');?></h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="portlet-body form">
                        <?php
                            $attributes = array('role'=>'form','name'=>'ed_p');
                            echo form_open_multipart('admin/user/Patient_controller/edit_save_patient', $attributes);
                        
                         ?>
                    
                        <div class="form-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class=" control-label"> <?php echo display('title')?> </label>
                                    <div class="">
                                        <input type="text" name="title" class="form-control" value="<?php echo html_escape(@$patient_info->title);?>"  placeholder="title" > 
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label"><?php echo display('family_name')?> </label>
                                    <div class="">
                                        <input type="text" name="family_name" class="form-control" value="<?php echo html_escape(@$patient_info->family_name);?>"  placeholder="Family Name" required> 
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label"> <?php echo display('given_name')?> </label>
                                    <div class="">
                                        <input type="text" name="given_name" class="form-control" value="<?php echo html_escape(@$patient_info->given_name);?>" placeholder="Given Name" > 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <input type="hidden" name="patient_id" class="form-control" value="<?php echo html_escape(@$patient_info->patient_id); ?>"> 
                              
                                <div class="form-group col-md-4">
                                    <label class=" control-label"> <?php echo display('sex');?></label>
                                    <div class="">
                                        <input type="radio" id="checkbox2_5" name="gender" <?php echo (html_escape($patient_info->sex)=='Male')?'checked':'' ?> required value="Male">
                                        <label for="checkbox2_5"> <?php echo display('male');?></label>
                                        <input type="radio" id="checkbox2_10" name="gender" required <?php echo (html_escape($patient_info->sex)=='Female')?'checked':'' ?> value="Female">
                                        <label for="checkbox2_10"> <?php echo display('female');?></label>

                                        <input type="radio" id="checkbox2_0" name="gender" required <?php echo (html_escape($patient_info->sex)=='other')?'checked':'' ?> value="other">
                                        <label for="checkbox2_0"> <?php echo display('others');?></label>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" control-label"><?php echo display('birth_date'); ?></label>
                                    <div class=" ">
                                       <input type="text" name="birth_date" value="<?php echo html_escape(@$patient_info->birth_date);?>" class="form-control datepicker1 birth_date"  placeholder="<?php echo display('date_placeholder'); ?>">
                                    </div>
                                   
                                </div>


                                <div class="form-group col-md-4">
                                    <label class=" control-label"><?php echo display('age'); ?></label>
                                    
                                    <div class="">
                                       <input type="number" name="old" id="old" class="form-control" placeholder="<?php echo display('age'); ?>">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label class=" control-label"><span class="text-danger">*</span> <?php echo display('email'); ?></label>
                                    <div class="">
                                        <input type="email" name="email" value="<?php echo html_escape(@$patient_info->patient_email);?>" class="form-control" required placeholder="<?php echo display('email'); ?>"> 
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" control-label"> <?php echo display('phone_number'); ?></label>
                                    <div class="">
                                        <input type="text" name="phone" value="<?php echo html_escape(@$patient_info->patient_phone);?>" class="form-control" required placeholder="<?php echo display('phone_number'); ?>"> 
                                        <span class="text-danger"><?php echo form_error('phone'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" control-label"> <?php echo display('mobile')?></label>
                                    <div >
                                        <input type="text"  name="mobile_number" value="<?php echo html_escape(@$patient_info->mobile_number);?>" class="form-control" required placeholder="Mobile Number"> 
                                        
                                    </div>
                                </div>
                           </div> 

                           <div class="row">
                               <div class="form-group col-md-8">
                                <label class="control-label"> <?php echo display('address')?></label>
                                    <div class="">
                                         <textarea name="address" id="editor1"  class="form-control" rows="3" required><?php echo @$patient_info->address;?></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" control-label"> <?php echo display('suburb')?></label>
                                    <div class="">
                                        <input type="text" value="<?php echo html_escape(@$patient_info->suburb);?>" name="suburb" class="form-control">       
                                    </div>
                                </div>
                           </div>


                        <div class="row">

                            <div class="form-group col-md-4">
                                <label class="control-label"><?php echo display('post_code')?></label>
                                <div class="">
                                    <input type="text" value="<?php echo html_escape(@$patient_info->post_code);?>" class="form-control" name="post_code">       
                                </div>
                            </div> 

                           <div class="form-group col-md-4">
                                    <label class="control-label"><span class="text-danger">*</span><?php echo display('blood_group'); ?> </label>
                                    <div class="">
                                        <select class="form-control" name="blood_group" required="">
                                            <option value=''>--Select Blood Group--</option>
                                            <option value='A+' <?php echo(html_escape(@$patient_info->blood_group)=='A+'?'selected':'');?>>A+</option>
                                            <option value='A-' <?php echo(html_escape(@$patient_info->blood_group)=='A-'?'selected':'');?>>A-</option>
                                            <option value='B+' <?php echo(html_escape(@$patient_info->blood_group)=='B+'?'selected':'');?>>B+</option>
                                            <option value='B-' <?php echo(html_escape(@$patient_info->blood_group)=='B-'?'selected':'');?>>B-</option>
                                            <option value='O+' <?php echo(html_escape(@$patient_info->blood_group)=='O+'?'selected':'');?>>O+</option>
                                            <option value='O-' <?php echo(html_escape(@$patient_info->blood_group)=='O-'?'selected':'');?>>O-</option>
                                            <option value='AB+' <?php echo(html_escape(@$patient_info->blood_group)=='AB+'?'selected':'');?>>AB+</option>
                                            <option value='AB-' <?php echo(html_escape(@$patient_info->blood_group)=='AB-'?'selected':'');?>>AB-</option>


                                            <option value='Unknown' <?php echo(html_escape(@$patient_info->blood_group)=='Unknown'?'selected':'');?>>Unknown</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label"><?php echo display('picture'); ?></label>
                                    <div class="">
                                        <input type="file" name="picture">       
                                    </div>
                                </div>    

                                
                            </div>    

                                
                            </div>

                            <fieldset>
                                <label> <h2><?php echo display('emergency_contact')?></h2></label>

                                <div class="row">

                                    <div class="form-group col-md-4">
                                        <label class="control-label"> <?php echo display('title')?> </label>
                                        <div class="">
                                            <input type="text" name="emg_title" value="<?php echo html_escape(@$patient_info->emg_title);?>" class="form-control"  placeholder="Title"> 
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label"> <?php echo display('family_name')?> </label>
                                        <div class="">
                                            <input type="text" name="emg_family_name" class="form-control" value="<?php echo html_escape(@$patient_info->emg_family_name);?>"  placeholder="Family Name" > 
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label"> <?php echo display('given_name')?> </label>
                                        <div class="">
                                            <input type="text" name="emg_given_name" class="form-control" value="<?php echo html_escape(@$patient_info->emg_given_name);?>" placeholder="Given Name" > 
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label class=" control-label"> <?php echo display('phone_number'); ?></label>
                                        <div class="">
                                            <input type="text"  name="emg_phone" value="<?php echo html_escape(@$patient_info->emg_phone);?>" class="form-control" required placeholder="Phone Number"> 
                                            
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class=" control-label"><span class="text-danger">*</span> <?php echo display('mobile')?></label>
                                        <div >
                                            <input type="text"  name="emg_mobile" value="<?php echo html_escape(@$patient_info->emg_mobile);?>" class="form-control" required placeholder="Mobile Number"> 
                                            
                                        </div>
                                    </div>

                              
                                </div> 
                            </fieldset>

                            <fieldset>
                                <label> <h2><?php echo display('madical_info')?></h2></label>

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label class="control-label"> Do you have allergies to any medicine or food ?</label>
                                        <div class="">
                                            <input type="text" value="<?php echo html_escape(@$madical_info->food_allergies);?>" name="food_allergies" class="form-control"  placeholder="Do you have allergies to any medicine or food"> 
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label"> Do you have a tendency to bleed or buise easily ?</label>
                                        <div class="">
                                            <input type="text" name="bleed_tendency" class="form-control" value="<?php echo html_escape(@$madical_info->bleed_tendency);?>"  placeholder="Do you have a tendency to bleed or buise easily ?" > 
                                        </div>
                                    </div>

                                    <p>Please select Illness as following</p>

                                    <div class="form-group col-md-4">
                                        <label class="control-label"> Heart Diseases </label>
                                        <div class="">
                                            <select class="form-control" name="heart_disease">
                                                <option value="Yes" <?php echo html_escape(@$madical_info->heart_disease=='Yes'?'selected':'');?>>Yes</option>
                                                <option value="No" <?php echo html_escape(@$madical_info->heart_disease=='No'?'selected':'');?>>No</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label class=" control-label"> HighBlood Pressure</label>
                                        <div class="">
                                            <select class="form-control" name="high_blood">
                                                <option value="Yes" <?php echo html_escape(@$madical_info->high_blood=='Yes'?'selected':'');?>>Yes</option>
                                                <option value="No" <?php echo html_escape(@$madical_info->high_blood=='No'?'selected':'');?>>No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class=" control-label"> Any Accidents</label>
                                        <div >
                                            <select class="form-control" name="accidents">
                                                <option value="Yes" <?php echo html_escape(@$madical_info->accidents=='Yes'?'selected':'');?>>Yes</option>
                                                <option value="No" <?php echo html_escape(@$madical_info->accidents=='No'?'selected':'');?>>No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class=" control-label"> Diabetic</label>
                                        <div >
                                            <select class="form-control" name="diabetic">
                                                <option value="Yes" <?php echo html_escape(@$madical_info->diabetic=='Yes'?'selected':'');?>>Yes</option>
                                                <option value="No" <?php echo html_escape(@$madical_info->diabetic=='No'?'selected':'');?>>No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">

                                        <label class="control-label"> Any Surgeries</label>

                                        <div>
                                             <select class="form-control" name="surgeries">
                                                <option value="Yes" <?php echo html_escape(@$madical_info->surgeries=='Yes'?'selected':'');?>>Yes</option>
                                                <option value="No" <?php echo html_escape(@$madical_info->surgeries=='No'?'selected':'');?>>No</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class=" control-label"> Others</label>
                                        <div >
                                             <select class="form-control" name="others">
                                                <option value="Yes" <?php echo html_escape(@$madical_info->others=='Yes'?'selected':'');?>>Yes</option>
                                                <option value="No" <?php echo html_escape(@$madical_info->others=='No'?'selected':'');?>>No</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="form-group col-md-12">
                                        <label class=" control-label col-md-9"> Do you Consider yourself to be in a high risk group for infectious diseases?</label>
                                        <div class="col-md-3">
                                             <input type="text" value="<?php echo html_escape(@$madical_info->high_risk_diseases);?>" name="high_risk_diseases" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label class=" control-label"> Please list any relevant family medical history and social history</label>
                                        <div >
                                            <textarea class="form-control" rows="2"  name="family_history"> <?php echo html_escape(@$madical_info->family_history);?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class=" control-label"> Please list your current medical conditions and medications</label>
                                        <div >
                                            <textarea class="form-control" rows="2" name="current_medication"><?php echo html_escape(@$madical_info->current_medication);?></textarea>
                                        </div>
                                    </div>
                                </div> 

                            </fieldset>

                             <div class="row" id="male">

                                <div class="form-group ">
                                    <label class=" control-label col-md-9"> Are you under Private Health Insurance Extras covering Acupuncture or chiese Herbal Medicine?</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="otheres_msrance">
                                            <option value="Yes" <?php echo html_escape(@$madical_info->others_msurance=='Yes'?'selected':'');?>>Yes</option>
                                            <option value="No" <?php echo html_escape(@$madical_info->others_msurance=='No'?'selected':'');?>>No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class=" control-label col-md-9"> Are you covered by Worksafe or Comcare?</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="others_comcare">
                                            <option value="Yes" <?php echo html_escape(@$madical_info->others_comcare=='Yes'?'selected':'');?>>Yes</option>
                                            <option value="No" <?php echo html_escape(@$madical_info->others_comcare=='No'?'selected':'');?>>No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class=" control-label col-md-9"> Are you covered by TAC?</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="others_tac">
                                            <option value="Yes" <?php echo html_escape(@$madical_info->others_tac=='Yes'?'selected':'');?>>Yes</option>
                                            <option value="No" <?php echo html_escape(@$madical_info->others_tac=='No'?'selected':'');?>>No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class=" control-label col-md-9"> Are you a Pensioner, Student, Low-Income Healtheare Card Holder</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="others_low_income">
                                            <option value="Pensioner" <?php echo html_escape(@$madical_info->others_low_income=='Pensioner'?'selected':'');?>>Pensioner</option>
                                            <option value="Student" <?php echo html_escape(@$madical_info->others_low_income=='Low-Income'?'selected':'');?>>Student</option>
                                            <option value="Low-Income" <?php echo html_escape(@$madical_info->others_low_income=='Low-Income'?'selected':'');?>>Low-Income </option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group ">
                                    <label class=" control-label col-md-9"> How do you know our clinic? Friend, Yellow Page, Google</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="others_reffer">
                                            <option value="Friend" <?php echo html_escape(@$madical_info->others_reffer=='Friend'?'selected':'');?>>Friend</option>
                                            <option value="Yellow Page" <?php echo html_escape(@$madical_info->others_reffer=='Yellow Page'?'selected':'');?>>Yellow Page</option>
                                            <option value="Google" <?php echo html_escape(@$madical_info->others_reffer=='Google'?'selected':'');?>>Google</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class=" control-label col-md-9">Do you require a Subscription on every visit?</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="subscription">
                                            <option value="Yes" <?php echo html_escape(@$madical_info->subscription=='Yes'?'selected':'');?>>Yes</option>
                                            <option value="No" <?php echo html_escape(@$madical_info->subscription=='No'?'selected':'');?>>No</option>
                                        </select>
                                    </div>
                                </div>

                                    
                            </div>


                            <div class="row" id="female">

                                <div class="form-group ">
                                    <label class=" control-label col-md-9"> Are you pregnant or is there apossibility to being pregnant?</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="female_pregnent">
                                            <option value="Yes"  <?php echo html_escape(@$madical_info->female_pregnent=='Yes'?'selected':'');?>>Yes</option>
                                            <option value="No"  <?php echo html_escape(@$madical_info->female_pregnent=='No'?'selected':'');?>>No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class=" control-label col-md-9"> Are you breast feeding now? </label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="female_breast_feeding">
                                            <option value="Yes"  <?php echo html_escape(@$madical_info->female_breast_feeding=='Yes'?'selected':'');?>>Yes</option>
                                            <option value="No"  <?php echo html_escape(@$madical_info->female_breast_feeding=='No'?'selected':'');?>>No</option>
                                        </select>
                                    </div>
                                </div>
                                    
                            </div>



                            
                            <input type="hidden" name="psex" id="psex" value="<?php echo html_escape($patient_info->sex);?>">


                            <div class="form-group row ">
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
