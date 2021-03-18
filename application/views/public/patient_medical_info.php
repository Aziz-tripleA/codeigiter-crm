<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Information </title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- flaticon -->
        <link href="<?php echo base_url(); ?>assets/public_css/flaticon.css" rel="stylesheet">
        <!-- font-awesome -->
        <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- style -->
        <link href="<?php echo base_url(); ?>assets/public_css/appointment_style.css" rel="stylesheet">
        <!-- coustome style -->
        <link href="<?php echo base_url();?>assets/dist/css/coustom_css.css" rel="stylesheet">
    


    </head>
    <body>

    <?php 
        @$js_data = json_decode($prescription->data);
        @$medicine_data =  (array) $js_data->medicine_data;
        
    ?>

<div id="PrintMe">
        <div class="container">
            <div class="row top-bar">
                 
                <div class="social-icons pull-right">
                    <ul>
                        <li><a href="" onclick="printContent('PrintMe')" title="Print"><i class="fa fa-print"></i></a></li>
                    </ul>
                </div> 
            </div>
        </div>
        
        <section>
            <div class="container">
                <div class="row details-content">
                    <div class="patient-details text-center">
                        <h3>Name: <?php echo html_escape(@$info->family_name) .' '. html_escape(@$info->given_name) ;?>
                        &nbsp;Age: <?php echo html_escape(@$info->birth_date);?>
                        &nbsp;Sex: <?php echo html_escape(@$info->sex) ;?> 
                        &nbsp;Patient ID: <?php echo html_escape(@$info->patient_id);?>
                        </h3>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="table-responsive marg">
                            <table  class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Effect</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        <td>Do you have allergies to any medicine or food ?</td>
                                        <td><?php echo html_escape(@$info->food_allergies);?></td>
                                    </tr>

                                     <tr>
                                        <td> Do you have a tendency to bleed or buise easily ?</td>
                                        <td><?php echo html_escape(@$info->bleed_tendency);?></td>
                                    </tr>
                                     <tr>
                                        <td>Heart Diseases</td>
                                        <td><?php echo html_escape(@$info->heart_disease);?></td>
                                    </tr>

                                    <tr>
                                        <td>Diabetic</td>
                                        <td><?php echo html_escape(@$info->diabetic);?></td>
                                    </tr>

                                     <tr>
                                        <td>HighBlood Pressure</td>
                                        <td><?php echo html_escape(@$info->high_blood_pressure);?></td>
                                    </tr>
                                     <tr>
                                        <td>Any Surgeries</td>
                                        <td><?php echo html_escape(@$info->surgeries);?></td>
                                    </tr>
                                    
                                     <tr>
                                        <td>Any Accidents</td>
                                        <td><?php echo html_escape(@$info->accidents);?></td>
                                    </tr>
                                     
                                    
                                     <tr>
                                        <td>Others</td>
                                        <td><?php echo html_escape(@$info->others);?></td>
                                    </tr>

                                    <tr>
                                        <td>Do you Consider yourself to be in a high risk group for infectious diseases?</td>
                                        <td><?php echo html_escape(@$info->high_risk_diseases);?></td>
                                    </tr>
                                    <tr>
                                        <td>Please list any relevant family medical history and social history</td>
                                        <td><?php echo html_escape(@$info->family_history);?></td>
                                    </tr>
                                    <tr>
                                        <td>Please list your current medical conditions and medications</td>
                                        <td><?php echo html_escape(@$info->current_medication);?></td>
                                    </tr>
                                    <tr>
                                        <td>Are you under Private Health Insurance Extras covering Acupuncture or chiese Herbal Medicine?</td>
                                        <td><?php echo html_escape(@$info->others_msurance);?></td>
                                    </tr>
                                    <tr>
                                        <td>Are you covered by Worksafe or Comcare?</td>
                                        <td><?php echo html_escape(@$info->others_comcare);?></td>
                                    </tr>
                                    <tr>
                                        <td>Are you covered by TAC?</td>
                                        <td><?php echo html_escape(@$info->others_tac);?></td>
                                    </tr>
                                    <tr>
                                        <td>Are you a Pensioner, Student, Low-Income Healtheare Card Holder</td>
                                        <td><?php echo html_escape(@$info->others_low_income);?></td>
                                    </tr>

                                    <tr>
                                        <td>How do you know our clinic? Friend, Yellow Page, Google</td>
                                        <td><?php echo html_escape(@$info->others_reffer);?></td>
                                    </tr>
                                    <tr>
                                        <td> Do you require a Subscription on every visit?</td>
                                        <td><?php echo html_escape(@$info->subscription);?></td>
                                    </tr>

                                    <tr>
                                        <td>Are you pregnant or is there a possibility of being pregnant?</td>
                                        <td><?php echo html_escape(@$info->female_pregnent);?></td>
                                    </tr>

                                    <tr>
                                        <td>Are you breast feeding now?</td>
                                        <td><?php echo html_escape(@$info->female_breast_feeding);?></td>
                                    </tr>

                                </tbody>
                                
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        
        <div class="container">
            <div class="row footer">
               
            </div>
        </div>

    </div> 


    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/plugins/jQuery/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/print_preview.js" type="text/javascript"></script>


    </body>
</html>