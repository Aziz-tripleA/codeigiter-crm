<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1>Add Medicine Herbs </h1>
            <small>Add Medicine Herbs </small>
            
        </div>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!--  form area-->
            <div class="col-sm-12">
                <?php 
                    $msg = $this->session->flashdata('message');
                       if($msg){
                           echo htmlspecialchars_decode($msg);
                       }
                ?>
                <div  class="panel panel-bd">

                     <div class="panel-heading ">
                        <div class="panel-title">
                            <h4>Add Medicine Herbs </h4>
                        </div>
                    </div>

                    
                    <div class="panel-body">
                        <div class="portlet-body form">
                            <?php 
                                $attributes = array('class' => 'form-horizontal','role'=>'form');
                                echo form_open_multipart('admin/Setup_controller/save_medicine_herbs', $attributes);                
                             ?>
                            
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger">*</span> Language Name :</label>
                                    <div class="col-md-6">
                                    <select name="language_id" class="form-control" id="lang_id">
                                        <option>--Select Language--</option>
                                        <?php foreach($language as $value){
                                            echo'<option value="'.html_escape($value->lang_id).'">'.html_escape($value->lang_name).'</option>';
                                        }?>
                                    </select>
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger">*</span> Herbs Name :</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="herbs-search" autocomplete="off" placeholder="Herbs Name" name="herbs" required />
                                        <input type="hidden" required name="herbs_id" id="search-herbs_id" value="" />
                                        <div id="herbs-box"></div>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger">*</span> Medicine Name :</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" autocomplete="off" id="search-box" placeholder="<?php echo display('medicine_name');?>" name="medicine" required />
                                        <input type="hidden" required name="medicine_id" id="search-medicine_id" value="" />
                                        <?php echo form_error('medicine_id', '<div class=" text-danger">', '</div>'); ?>
                                        <div id="suggesstion-box"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="reset" class="btn btn-danger"><?php echo display('reset')?></button>
                                    <button type="submit" class="btn btn-success"><?php echo display('submit')?></button>
                                </div>
                            </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
