<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('medicine_list');?></h1>
            <small><?php echo display('medicine_list');?></small>
          
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    $msg = $this->session->flashdata('message');
                   if($msg){
                       echo htmlspecialchars_decode($msg);
                   }
                ?>
                <div class="panel panel-bd">
                    <div class="panel-body">
                         <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                             <thead>
                                <tr class="center">
                                    <th class="all"><?php echo display('medicine_name');?></th>
                                    <th class="all">Treatment</th>
                                    <th class="all">Classification</th>
                                    <th class="all">Diagonisis</th>
                                    <th class="all"><?php echo display('action');?> </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    foreach ($medicine as $value) {
                                ?>
                                    <tr>
                                        <td><?php echo html_escape($value->medicine);?></td>
                                        <td><?php echo html_escape($value->treatment);?></td>
                                        <td><?php echo html_escape($value->classification);?></td>
                                        <td><?php echo html_escape($value->diagonisis);?></td>
                                        <td class="text-right">
                                            <a href="<?php echo base_url();?>admin/Setup_controller/edit_medicine/<?php echo html_escape($value->medicine_id);?>" class="btn btn-xs btn-info">
                                            <i class="fa fa-edit"></i> </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>            
    </section>
</div>

