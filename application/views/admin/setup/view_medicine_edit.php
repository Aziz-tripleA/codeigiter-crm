<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('edit_medicine');?></h1>
            <small><?php echo display('edit_medicine');?></small>
            
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!--  form area -->
            <div class="col-sm-12">
                <div  class="panel panel-bd">

                    <div class="panel-heading ">
                        <div class="panel-title">
                            <h4><?php echo display('edit_medicine');?> </h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="portlet-body form">
                            <?php 
                                $attributes = array('class' => 'form-horizontal','role'=>'form','name'=>'em');
                                echo form_open_multipart('admin/Setup_controller/save_edit_medicine', $attributes);                
                            ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> Language Name :</label>
                                    <div class="col-md-6">
                                        <select name="language_id" class="form-control">
                                            <option>--Select Language--</option>
                                            <?php foreach($language as $value){
                                                echo'<option value="'.html_escape($value->lang_id).'" '.($med_info->lang_id==html_escape($value->lang_id)?'selected':'').'>'.html_escape($value->lang_name).'</option>';
                                            }?>
                                        </select>
                                    </div>
                                </div>                        
                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label">  Category :</label>
                                    <div class="col-md-6">
                                        <select name="category_id" class="form-control">
                                            <option>-- Category--</option>
                                            <?php foreach($category as $value){
                                                echo'<option value="'.html_escape($value->mc_id).'" '.($med_info->cat_id==html_escape($value->mc_id)?'selected':'').' >'.html_escape($value->cat_name).'</option>';
                                            }?>
                                        </select>
                                    </div>
                                </div>
                           
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> <?php echo display('medicine_name');?> :</label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo html_escape($med_info->medicine);?>" name="medicine_name" class="form-control test" placeholder="<?php echo display('medicine_name');?>" required > 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Classification Name :</label>
                                    <div class="col-md-6">
                                       <input type="text" name="cls_name"  value="<?php echo html_escape($med_info->classification);?>" class="form-control"  placeholder="Classification Name"  />
                                       
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Symptom Name :</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo html_escape($med_info->symptom);?>" placeholder="Symptom Name" name="symptom"  />
                                        
                                    </div>
                                </div>
                  
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> Treatment Name :</label>
                                    <div class="col-md-6">
                                         <input type="text" name="treatment" value="<?php echo html_escape($med_info->treatment);?>" placeholder="Treatment Name" class="form-control">
                                    </div>
                                </div>
                                 
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> Diagonisis :</label>
                                    <div class="col-md-6">
                                         <input type="text" class="form-control" value="<?php echo html_escape($med_info->diagonisis);?>" placeholder="Diagonisis" name="diagonisis">
                                    </div>
                                </div>
                                
                                <input type="hidden" name="medicine_id" value="<?php echo html_escape($med_info->medicine_id);?>">
                                 
                            </div>

                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="<?php echo display('update');?>">
                            </div>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
     </div>           
    </section>
</div>

