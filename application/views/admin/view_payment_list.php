

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('payment_list');?></h1>
            <small><?php echo display('payment_list');?></small>
              
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php 
        echo @$msg = $this->session->flashdata('message'); 
     ?>
    <div class="row">
        <!--  table area -->
        <div class="col-sm-12">
            <div  class="panel panel-bd">
                <div class="panel-heading no-print">
                    <div class="btn-group"> 
                        <h4><?php echo display('payment_list');?></h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="patient_list">
                        <thead>
                            <tr>
                                <th><?php echo display('patient_id');?></th>
                                <th><?php echo display('appointment_id');?></th>
                                <th><?php echo display('email');?></th>
                                <th><?php echo display('amount');?></th>
                                <th><?php echo display('date');?></th>
                                <th><?php echo display('notes');?></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                                foreach ($info as $value) {
                            ?>
                            <tr class="odd gradeX">
                                

                                <td><?php echo html_escape($value->patient_id); ?></td>
                                <td><?php echo html_escape($value->appointment_id);?></td>
                                <td><?php echo html_escape($value->payer_email);?></td>
                                <td><?php echo html_escape($value->amount);?></td>
                                <td><?php echo html_escape($value->date_time);?></td>
                                <td><?php echo html_escape($value->notes);?></td>
                                
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



<?php
     $printTitle = "Patient List";
     $this->session->set_flashdata(array('pTitle' => $printTitle));    
?>  



