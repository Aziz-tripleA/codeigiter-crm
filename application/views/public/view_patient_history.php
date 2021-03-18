<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> <?php echo display('patient_history');?> </title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- flaticon -->
        <link href="<?php echo base_url(); ?>assets/public/public_css/css/flaticon.css" rel="stylesheet">
        <!-- font-awesome -->
        <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- style -->
        <link href="<?php echo base_url(); ?>assets/public_css/style2.css" rel="stylesheet">
    
    </head>
<body>

<div class="container" >
    <div class="row top1-bar">
        <div class="social-icons pull-right">
            <ul>
                <li><a href="" onclick="printContent('div1')" title="Print"><i class="fa fa-print"></i> Print</a></li>
            </ul>
        </div> 
    </div>
</div>


<div id="div1">
    <div class="container">
        <div class="row top-bar">
            <div class="left-text pull-left">
                <p><b><?php echo display('patient_history');?></b> </p>
            </div>  
        </div>
    </div>
        
        <div class="container header">
            <div class="logo pull-left">
                <address>
                    <?php if($p_info->picture!=NULL){ ?>

                        <img width="180" src="<?php echo html_escape($p_info->picture);?>">
                    <?php } else{ ?>
                        <img width="180" src="<?php echo base_url();?>assets/images/user.png">
                    <?php } ?>
                </address>
            </div>

        <div class="header-right-info pull-left clearfix">
            <div class="single-header-info">
                <h4>
                    <strong><?php echo display('patient_name');?> : </strong><?php echo html_escape(@$p_info->family_name) .' '. html_escape(@$p_info->given_name) ;?></p>
                    <p><strong><?php echo display('patient_id');?> : </strong><?php echo html_escape($p_info->patient_id);?></p>
                    <p><strong><?php echo display('phone_number');?> : </strong><?php echo html_escape($p_info->patient_phone);?></p>
                    <p><strong><?php echo display('blood_group');?> : </strong><?php echo html_escape($p_info->blood_group);?></p>
                    <p><strong><?php echo display('birth_date');?> : </strong>
                        <?php
                            $date1 = date_create(@$p_info->birth_date);
                            echo date_format($date1,"d-M-Y");
                        ?>,
                    </p>
               </h4>
            </div>
        </div>
     </div>
        
            <section>
                <div class="container">
                    <div class="row details-content">
                        <div class="col-sm-12">
                            <div class="table-responsive marg">
                                <table  class="table table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <th><?php echo display('appointment_id');?></th>
                                            <th><?php echo display('doctor_name');?></th>
                                            <th><?php echo display('department');?></th>
                                            <th><?php echo display('date');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(!empty($app_info)){
                                    foreach ($app_info as $value1) { 
                                    ?>
                                        <tr>
                                            <td>
                                                <span class="switch-print"><?php echo html_escape($value1->appointment_id);?></span>
                                                <a target="_blank"  class="no-print"  href="<?php echo base_url();?>admin/Prescription_controller/my_prescription/<?php echo $value1->appointment_id;?>"><?php echo html_escape($value1->appointment_id);?></a>
                                                
                                            </td>
                                            <td><?php echo html_escape($value1->doctor_name);?></td>
                                            <td><?php echo html_escape($value1->department);?></td>
                                            <td><?php echo html_escape($value1->create_date_time);?></td>
                                        </tr>
                                       
                                    <?php  }
                                    }else{
                                        echo '<div class="alert alert-danger alert-dismissable ">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                <strong>You have no prescription history!</strong>
                                        </div>';
                                    }
                                    ?>
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" class="text-center">Data retrieved from infoplease and worldometers</a>.</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container">
                <div class="row footer">
                    <p></p>
                </div>
            </div>
        </div>
    </body>
</html>