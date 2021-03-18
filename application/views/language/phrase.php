
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('prescription_list')?></h1>
            <small><?php echo display('prescription_list')?></small>
            
        </div>
    </section>


    <!-- Main content -->
    <section class="content">
        
        <div class="row">
            <!-- phrase -->
            <div class="col-sm-12">
            <div  class="panel panel-bd ">
                <div class="panel-heading ">
                    <div class="panel-title" >
                        <a href="<?php echo base_url('language') ?>" class="btn btn-info pull-right">Language Home</a>
                        <h4>Phrase</h4>
                    </div>
               </div>
                <div class="panel-body">
                    <div class="portlet-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td colspan="2">
                                        <?php echo  form_open('language/addPhrase', ' class="form-inline" ') ?> 
                                            <div class="form-group">
                                                <label class="sr-only" for="addphrase"> Phrase Name</label>
                                                <input name="phrase[]" type="text" class="form-control" id="addphrase" placeholder="Phrase Name">
                                            </div>
                                              
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        <?php echo form_close(); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-th-list"></i></th>
                                    <th>Phrase</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($phrases)) {?>
                                    <?php $sl = 1 ?>
                                    <?php foreach ($phrases as $value) {?>
                                    <tr>
                                        <td><?php echo  $sl++ ?></td>
                                        <td><?php echo  html_escape($value->phrase) ?></td>
                                    </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



