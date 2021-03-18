<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('add_medicine');?></h1>
            <small><?php echo display('add_medicine');?></small>
            
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
                <div class="panel panel-bd">
                    <div class="panel-heading ">
                        <div class="panel-title">
                            <h4><?php echo display('add_medicine');?> </h4>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="portlet-body form">
                            <?php 
                                $attributes = array('class' => 'form-horizontal','role'=>'form');
                                echo form_open_multipart('admin/Setup_controller/save_medicine', $attributes);                
                             ?>
                            
                            <div class="form-body">
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger">*</span> Language Name :</label>
                                    <div class="col-md-6">
                                        <select name="language_id" class="form-control" onchange="laodCata(this.value)">
                                            <option value="">--Select Language--</option>
                                            <?php foreach($language as $value){
                                                echo'<option value="'.html_escape($value->lang_id).'">'.html_escape($value->lang_name).'</option>';
                                            }?>
                                        </select>
                                    </div>
                                </div>                        
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> <span class="text-danger">*</span> Category :</label>
                                    <div class="col-md-6">
                                        <select name="category_id" onchange="loadClassi(this.value)" class="form-control category" required="">
                                            <option value="">-- Category--</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"> <span class="text-danger">*</span> Classification :</label>
                                    <div class="col-md-6">
                                        <select name="cls_name" class="form-control classi" required="">
                                            <option>-- classification--</option>
                                            
                                        </select>
                                    </div>
                                </div>
                           
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><span class="text-danger">*</span> <?php echo display('medicine_name');?> :</label>
                                    <div class="col-md-6">
                                        <input type="text" name="medicine_name" class="form-control test" placeholder="<?php echo display('medicine_name');?>" required > 
                                    </div>
                                </div>

                               
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Symptom Name :</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control"  placeholder="Symptom Name" name="symptom"  />
                                        
                                    </div>
                                </div>
                  
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> Treatment Name :</label>
                                    <div class="col-md-6">
                                         <input type="text" name="treatment" placeholder="Treatment Name" class="form-control">
                                    </div>
                                </div>
                                 
                                 <div class="form-group">
                                    <label class="col-md-3 control-label"> Diagonisis :</label>
                                    <div class="col-md-6">
                                         <input type="text" class="form-control" placeholder="Diagonisis" name="diagonisis">
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



