
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
                        <a href="<?php echo  base_url('language') ?>" class="btn btn-info pull-right text-white">Language Home</a>
                        <h4>Language Home</h4>
                    </div>
               </div>
                <div class="panel-body">
                    <div class="portlet-body">

                <?php echo  form_open('language/addlebel') ?>
                <table class="table table-striped">
                    <thead> 
                        <tr>
                            <td colspan="3"> 
                                <button type="submit" class="btn btn-success">Save</button>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="fa fa-th-list"></i></th>
                            <th>Phrase</th>
                            <th>Label</th> 
                        </tr>
                    </thead>

                    <tbody>
                        <?php echo  form_hidden('language', $language) ?>
                            <?php if (!empty($phrases)) {?>
                                <?php $sl = 1 ?>
                                <?php foreach ($phrases as $value) {?>
                                <tr class="<?php echo  (empty(html_escape($value->$language))?"bg-danger":null) ?>">
                                
                                    <td><?php echo $sl++ ?></td>
                                    <td><input type="text" name="phrase[]" value="<?php echo html_escape($value->phrase) ?>" class="form-control" readonly></td>
                                    <td><input type="text" name="lang[]" value="<?php echo html_escape($value->$language) ?>" class="form-control"></td> 
                                </tr>
                                <?php } ?>
                            <?php } ?>

                            <tr>
                                <td colspan="3"> 
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </td>
                            </tr>
                    </tbody>
                    <?php echo form_close() ?>
                </table>
            </div>
            </div>
            </div>
            </div> 

        </div>
            
    </section>
</div>


