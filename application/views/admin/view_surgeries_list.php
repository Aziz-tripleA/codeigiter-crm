
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?= display('surgeries_list');?></h1>
            <small><?= display('surgeries_list');?></small>
            
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <!--  table area -->
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
            <div  class="panel panel-bd">
                <div class="panel-heading ">
                    <div class="panel-title" >
                        <h4><?php echo display('surgeries_list');?></h4>
                    </div>
                </div>
                <div class="panel-body">
                    <?php  //var_dump($clinics);  ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="patient_list">
                        <thead>
                             <tr>
                               
                                <th><?php echo display('id');?></th>
                                <th><?= display('title')  ?></th>
                                <th><?= display('patient')  ?></th>
                                <th><?= display('procedure')  ?></th>
                                <th><?= display('clinic')  ?></th>
                                <th><?= display('date')  ?></th>
                                <th><?= display('notes')  ?></th>
                    
                                <th width="120"><?php echo display('action');?></th> 
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            foreach ($surgeries as $surgery) {
                                $patient  = $this->patient_model->get_patient_inde_info($surgery->patient_id);
                                
                                $procedure  = $this->procedure_model->get_procedure($surgery->procedure_id);
                                $clinic  = $this->clinic_model->get_clinic($surgery->clinic_id);
                                ?>
                                <tr>
                                <td><?php echo html_escape(@$surgery->id); ?></td>
                                <td><?php echo html_escape(@$surgery->title); ?></td>
                                 <td><?php echo html_escape(@$patient->given_name); ?></td>
                                <td><?php echo html_escape(@$procedure->name); ?></td> 
                                <td><?php echo html_escape(@$clinic->clinic_name); ?></td> 
                                <td><?php echo html_escape(@$surgery->date); ?></td> 
                                <td><?php echo html_escape(@$surgery->note); ?></td> 
                                <td class="">
                                    <a  class="btn btn-xs btn-info" href="<?php echo base_url();?>admin/surgeries_controller/surgery_edit/<?php echo html_escape($surgery->id);?>">
                                    <i class="fa fa-edit"></i> </a>
                                    
                                    <a  class="btn btn-xs btn-danger" href="<?php echo base_url();?>admin/surgeries_controller/surgery_delete/<?php echo html_escape($surgery->id) ;?>" onclick="return confirm('Are you want to delete?');">
                                    <i class="fa fa-trash"></i> </a>
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

<?php
     $printTitle = "Patient List";
     $this->session->set_flashdata(array('pTitle' => $printTitle));
?>  



