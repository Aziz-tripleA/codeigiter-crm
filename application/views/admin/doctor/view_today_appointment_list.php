
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('today_appointment');?></h1>
            <small><?php echo display('today_appointment');?></small>
            
        </div>
    </section>

    <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php 
                $mag = $this->session->flashdata('exeption');
                if($mag !=''){
                    echo "<div class='alert alert-success msg'>".$mag."</div><br>";
                }
            ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="appointment">
                            <thead>
                                <tr>
                                    <th class=""><?php echo display('patient_name');?></th>
                                    <th class="none"><?php echo display('patient_id');?></th>
                                    <th class="all"><?php echo display('phone_number');?></th>
                                    <th class="none"><?php echo display('patient_cc');?></th>
                                    <th class="all"><?php echo display('appointment_id');?></th>
                                    <th class="all"><?php echo display('venue');?></th>
                                    <th class="all"><?php echo display('sequence');?></th>
                                    <th class="all"><?php echo display('date');?></th>
                                    <th class="all">Payment Status</th>
                                    <th class="desktop"><?php echo display('action');?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    foreach (@$appointmaent_info as $value) {

                                        $Payment = $this->db->select('*')
                                     ->from('payment_table')
                                     ->where('appointment_id',$value->appointment_id)
                                     ->get()
                                     ->row();
                                ?>

                                    <tr>
                                    <td><?php echo html_escape($value->patient_name);?></td>
                                    <td><?php echo html_escape($value->patient_id);?></td>
                                    <td><?php echo html_escape($value->patient_phone);?></td>
                                    <td><?php echo html_escape($value->problem);?></td>
                                    <td><?php echo html_escape($value->appointment_id);?></td>
                                    <td><?php echo html_escape($value->venue_name);?></td>
                                    <td><?php echo html_escape($serial_time);?></td>
                                    <td><?php echo html_escape($value->date);?></td>
                                    <td>
                                        <?php if($Payment!=NULL){?>
                                            <a class="btn btn-sm btn-primary"> Paid</a>
                                        <?php } else{ ?>
                                            <a class="btn btn-sm btn-danger" target="_blank" href="<?php echo base_url();?>admin/payment_method/Payment/pay_with_doctor/<?php echo html_escape($value->appointment_id);?>"> Not Paid</a>
                                        <?php }?>
                                    </td>

                                    
                                        <td class="text-center">
                                        <?php if(empty($result) AND $this->session->userdata('user_type')==1) { ?>
                                            <a class="btn btn-xs btn-primary"  href="<?php echo base_url();?>admin/Prescription_controller/create_prescription/<?php echo html_escape($value->appointment_id); ?>" ><i class="fa fa-user-md"></i></a>
                                        <?php } else { ?>
                                        <a class="btn btn-xs btn-primary" data-original-title="View Prescription" target="_blank" href="<?php echo base_url();?>admin/Prescription_controller/my_prescription/<?php echo html_escape($value->appointment_id); ?>"><i class="fa fa-eye"></i></a>   
                                        <?php } ?> 
                                        <a class="btn btn-xs btn-success"  target="_blank" href="<?php echo base_url();?>admin/Basic_controller/my_appointment/<?php echo html_escape($value->appointment_id); ?>"><i class="fa fa-print"></i></a>
                                        <a class="btn btn-xs btn-info"  target="_blank" href="<?php echo base_url();?>History_controller/patient_history/<?php echo html_escape($value->patient_id); ?>"><i class="fa fa-history" aria-hidden="true"></i></a>
                                        
                                    </td>
                                  
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>

        </div>  
    </section>
</div>

