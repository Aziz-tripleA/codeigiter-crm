
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?= display('procedures_list');?></h1>
            <small><?= display('procedures_list');?></small>
            
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <!--  table area -->
        <div class="col-sm-12">
    <?php
        echo @$msg = $this->session->flashdata('message');
     ?>
            <div  class="panel panel-bd">
                <div class="panel-heading ">
                    <div class="panel-title" >
                        <h4><?php echo display('procedures_list');?></h4>
                    </div>
                </div>
                <div class="panel-body">
                    <?php  //var_dump($clinics);  ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="patient_list">
                        <thead>
                             <tr>
                               
                                <th><?php echo display('procedure_id');?></th>
                                <th><?= display('name')  ?></th>
                    
                                <th width="120"><?php echo display('action');?></th> 
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            foreach ($procedures as $procedure) {
                                ?>
                                <tr>
                                <td><?php echo html_escape($procedure->id); ?></td>
                                <td><?php echo html_escape($procedure->name); ?></td>
                                <!-- <td><?php echo html_escape($procedure->phone_number); ?></td>
                                <td><?php echo html_escape($procedure->clinic_address); ?></td> -->
                                <td class="">
                                    <a  class="btn btn-xs btn-info" href="<?php echo base_url();?>admin/Procedure_controller/procedure_edit/<?php echo html_escape($procedure->id);?>">
                                    <i class="fa fa-edit"></i> </a>
                                    
                                    <a  class="btn btn-xs btn-danger" href="<?php echo base_url();?>admin/Procedure_controller/procedure_delete/<?php echo html_escape($procedure->id) ;?>" onclick="return confirm('Are you want to delete?');">
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



