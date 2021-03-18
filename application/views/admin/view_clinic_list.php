
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?= display('clinics_list');?></h1>
            <small><?= display('clinics_list');?></small>
            
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
                        <h4><?php echo display('clinics_list');?></h4>
                    </div>
                </div>
                <div class="panel-body">
                    <?php  //var_dump($clinics);  ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="patient_list">
                        <thead>
                             <tr>
                               
                                <th><?php echo display('clinic_id');?></th>
                                <th>Name</th>
                                <th><?php echo display('phone_number');?></th>
                                
                                <th><?php echo display('address');?></th>
                         
                                <th width="120"><?php echo display('action');?></th> 
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            foreach ($clinics as $clinic) {
                                ?>
                                <tr>
                                <td><?php echo html_escape($clinic->id); ?></td>
                                <td><?php echo html_escape($clinic->clinic_name); ?></td>
                                <td><?php echo html_escape($clinic->phone_number); ?></td>
                                <td><?php echo html_escape($clinic->clinic_address); ?></td>
                                <td class="">
                                    <a  class="btn btn-xs btn-info" href="<?php echo base_url();?>admin/Clinic_controller/clinic_edit/<?php echo html_escape($clinic->id);?>">
                                    <i class="fa fa-edit"></i> </a>
                                    
                                    <a  class="btn btn-xs btn-danger" href="<?php echo base_url();?>admin/Clinic_controller/delete_clinic/<?php echo html_escape($clinic->id) ;?>" onclick="return confirm('Are you want to delete?');">
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



