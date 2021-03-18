
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('appointment_list');?></h1>
            <small><?php echo display('appointment_list');?></small>
            
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
            <div class="panel panel-bd">
                 <div class="panel-heading">
                    <div ><a href="<?php echo base_url()?>admin/doctor/Appointment_controller" class="btn btn-success pull-right"><?php echo display('create_appointment')?></a></div>
                    <div class="panel-title" >
                        <h4><?php echo display('appointment_list')?> </h4>
                    </div>
                </div>
                
                <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover dt-responsive" id="appointment">
                            <thead>
                                <tr>
                                    <th class="all"><?php echo display('patient_name'); ?></th>
                                    <th class="all"><?php echo display('phone_number'); ?></th>
                                    <th class="all"><?php echo display('appointment_id'); ?></th>
                                    <th class="all"><?php echo display('sequence'); ?></th>
                                    <th class="all"><?php echo display('date'); ?></th>
                                    <th class="all">Payment Status</th>
                                    <th class="desktop"><?php echo display('action'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    foreach (@$appointmaent_info as $value) {

                                    $result = $this->db->select('appointment_id,prescription_id')
                                     ->from('prescription_data')
                                     ->where('appointment_id',$value->appointment_id)
                                     ->get()
                                     ->row();

                                     $Payment = $this->db->select('*')
                                     ->from('payment_table')
                                     ->where('appointment_id',$value->appointment_id)
                                     ->get()
                                     ->row();
                                ?>

                                <tr <?php echo ($result)?'style="background-color: rgb(19, 203, 21)"':''?>>
                                    
                                    <td><?php echo html_escape(@$value->family_name) .' '. html_escape(@$value->given_name) ;?></td>
                                    <td><?php echo html_escape($value->patient_phone);?></td>
                                    <td><?php echo html_escape($value->appointment_id);?></td>
                                    <td><?php echo html_escape($value->sequence);?></td>
                                    <td><?php echo html_escape($value->date);?></td>

                                    <td>
                                        <?php if($Payment!=NULL){?>
                                            <a class="btn btn-sm btn-primary"> Paid</a>
                                        <?php } else{ ?>
                                            <a class="btn btn-sm btn-danger" target="_blank" href="<?php echo base_url();?>admin/payment_method/Payment/pay_with_doctor/<?php echo html_escape($value->appointment_id);?>"> Not Paid</a>
                                        <?php }?>
                                    </td>
                   

                                    <td class="text-center" width="120">
                                        <a class="btn btn-xs btn-success" data-toggle="tooltip" title="View Appointment" target="_blank" href="<?php echo base_url();?>admin/Basic_controller/my_appointment/<?php echo html_escape($value->appointment_id); ?>"><i class="fa fa-print"></i></a>
                                        <a class="btn btn-xs btn-info"data-toggle="tooltip" title="View History" target="_blank" href="<?php echo base_url();?>History_controller/patient_history/<?php echo html_escape($value->patient_id); ?>"><i class="fa fa-history" aria-hidden="true"></i></a>
                                        <?php if($result){?>
                                        <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Prescription" target="_blank" href="<?php echo base_url();?>admin/doctor/Prescription_controller/my_prescription/<?php echo html_escape($result->prescription_id); ?>" ><i class="fa fa-indent" aria-hidden="true"></i></a>
                                        <?php } else{?>
                                        <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Create Prescription"  href="<?php echo base_url();?>admin/doctor/Prescription_controller/create_prescription/<?php echo html_escape($value->appointment_id); ?>" ><i class="fa fa-user-md" aria-hidden="true"></i></a>
                                        <?php } ?>
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
    </section>
</div>


