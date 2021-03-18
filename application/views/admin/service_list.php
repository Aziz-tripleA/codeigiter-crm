
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('service_list')?></h1>
            <small><?php echo display('service_list')?></small>
           
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-sm-12">
                <?php
                    $msg = $this->session->flashdata('message');
                    if($msg){
                        echo htmlspecialchars_decode($msg);
                    } 
                ?>
                <div class="panel thumbnail">
                     <div class="panel-heading">
                        <div class="panel-title">
                            <a class="btn btn-success pull-right text-white" href="<?php echo base_url();?>admin/Service"> <i class="fa fa-plus"></i>  Add Service </a>  
                            <h2><?php echo display('service_list')?></h2>
                        </div>
                    </div> 
                    <div class="panel-body">
                        
                        <div class="table-responsive">
                       <table class="datatable table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" >
                            <thead>
                                <tr role="row">
                                    <th ><?php echo display('sl_no')?></th>
                                    <th><?php echo display('service_name')?></th>
                                    <th><?php echo display('price')?></th>
                                    <th><?php echo display('tex')?> </th>
                                    <th><?php echo display('description')?></th>
                                    <th><?php echo display('service_model')?></th>
                                    <th><?php echo display('action')?></th>
                                </tr>
                            </thead>

                            <tbody> 
                                <?php $i=1; foreach($service as $value){?> 
                                    <tr >
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo html_escape($value->service_name);?></td>
                                        <td><?php echo html_escape($value->service_price);?></td>
                                        <td><?php echo html_escape($value->tax);?></td>
                                        <td><?php echo html_escape($value->description);?></td>
                                        <td><?php echo html_escape($value->model);?></td>
                                        <td class="center">
                                            <a href="<?php echo base_url();?>admin/Service/edit_service/<?php echo html_escape($value->id);?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a> 
                                            <a href="<?php echo base_url();?>admin/Service/delete_service/<?php echo html_escape($value->id);?>"  onclick="return confirm('<?php echo display('delete_alert')?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> 
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





