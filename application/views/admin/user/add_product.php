
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('add_service')?></h1>
            <small><?php echo display('add_service')?></small>
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
                <div class="panel panel-bd ">

                    <div class="panel-heading">
                        <div class="panel-title">
                            <a class="btn btn-success pull-right text-white" href="<?php echo base_url()?>admin/user/Service/service_list"> <i class="fa fa-list"></i>  <?php echo display('service_list')?> </a>  
                            <h4>Add New Service </h4>
                        </div> 
                    </div>

                   
                    <?php 
                        $att = array('name'=>'insert_invoice','class' => 'form-horizontal','id'=>'insert_invoice');
                        echo form_open('admin/user/Service/save_service/',$att);
                    ?>
                    
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label col-md-3"><span class="text-danger">*</span> <?php echo display('service_name')?> </label>
                            <div class="col-md-7">
                                <input type="text" name="service_name" class="form-control" required=""> 
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="control-label col-md-3"> <span class="text-danger">*</span> <?php echo display('price')?> </label>
                            <div class="col-md-7">
                                <input type="number" name="price" class="form-control" required=""> 
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="control-label col-md-3"><span class="text-danger">*</span> <?php echo display('description')?> </label>
                            <div class="col-md-7">
                            <textarea name="description" class="form-control" cols="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"><?php echo display('tex')?> </label>
                            <div class="col-md-7">
                                <input type="number" name="tax" class="form-control" placeholder="Tax %" > 
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="control-label col-md-3"><span class="text-danger">*</span> <?php echo display('service_model')?> </label>
                            <div class="col-md-7">
                                <input type="text" name="model" class="form-control"  required="" > 
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-success"><?php echo display('submit')?></button>
                        </div>
                    </div>

                   <?php echo form_close();?>
                </div>
            </div>
        </div>
    </section>
</div>






