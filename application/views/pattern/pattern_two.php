   
<?php
    $phone = $this->db->select('*')
            ->from('web_pages_tbl')
            ->where('name','phone')
            ->get()
            ->row();

        $email = $this->db->select('*')
            ->from('web_pages_tbl')
            ->where('name','email')
            ->get()
            ->row();  
        $timezone = $this->db->select('*')
            ->from('web_pages_tbl')
            ->where('name','timezone')
            ->get()
            ->row();           
    date_default_timezone_set(@$timezone->details);
?>

    <?php 
         @$js_data = json_decode($prescription->data);
         @$medicine_data =  (array) $js_data->medicine_data;

    ?>

<div id="pad_p" class="container">
    <div class="row">
    <div class="social-icons pull-right">
         <label class="radio-inline btn btn-primary" id="dif"><?php echo display('default_print');?></label>
          <ul>
             
               <a href="" class="btn btn-success" onclick="printContent('print2')" title="Print"><i class="fa fa-print"></i>print</a>
          </ul>
      </div> 
    </div>
</div>

<div id="print2">

        <div class="container header" style="padding: 30px 20px; height: <?php echo html_escape(@$pattern->header_height)?>px;">

        </div>

        <section>
            <div class="container">
                <div class="row details-content">
                    <div class="patient-details text-center">
                        <h3>Name: <?php echo html_escape(@$patient->family_name) .' '. html_escape(@$patient->given_name) ;?>, 
                        &nbsp;Age: 
                        <?php
                            $date1=date_create(@$patient->birth_date);
                            $date2= date_create( date('y-m-d'));
                            $diff=date_diff($date1,$date2);
                            echo @$diff->format("%Y-Y:%m-M:%d-D");
                          ?>,
                        &nbsp;Sex: <?php echo html_escape(@$patient->sex) ;?>, 
                        &nbsp;Patient ID: <?php echo html_escape(@$patient->patient_id);?> 
                        </h3>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="table-responsive marg">
                            <table  class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Medicine</th>
                                        <th>Herbs</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($medicine_data['medicine'] as $key => $val){?>
                                    <tr>
                                        <td><?php echo html_escape(@$val->medicine);?></td>
                                        <td><?php echo html_escape(@$val->harbs);?></td>
                                        <td><?php echo html_escape(@$val->comment);?></td>
                                    </tr>
                                <?php }?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-center"><?php echo html_escape(@$js_data->overall_comment);?></a>.</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                     
                    </div>
                </div>
            </div>
        </section>
    
        
        <div class="container" >
            <div class="row footer" style="background:#fff;border-top: 7px double #EAEAEA; height: <?php echo html_escape(@$pattern->footer_height);?>px;">
               
            </div>
        </div>

    </div>   