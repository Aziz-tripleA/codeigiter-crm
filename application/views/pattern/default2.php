   
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

<div id="dif_p" class="container">
    <div class="row">
        <div class="social-icons pull-right">
            <label class="radio-inline btn btn btn-primary" id="pad"><?php echo display('pad_print');?></label>
            <ul>
                <a href="" class="btn btn-success" onclick="printContent('div1')" title="Print"><i class="fa fa-print"></i>print</a>
            </ul>
        </div> 
    </div>
</div>

<div id="div1">
        <div class="container">
            <div class="row top-bar" >
                <div class="left-text pull-left">
                    <p>
                    <b><?php echo display('date');?> :</b> 
                        <?php 
                             $date1 =  date_create(@$value->create_date_time);
                             echo $newDate = date_format($date1,"d-M-Y h:i:sa l");
                        ?>
                        </p>
                </div>  
                <div class="social-icons pull-right">
                   
                </div> 
            </div>
        </div>

        <div class="container header">
            <div class="logo pull-left">
               
                <h4 ><?php echo html_escape(@$doctor->doctor_name);?></h4>
                    <?php echo html_escape(@$doctor->degrees);?><br>
                    <b><?php echo html_escape(@$doctor->specialist);?></b><br>
                    <?php echo html_escape(@$doctor->designation);?><br>
                    <b><?php echo html_escape(@$doctor->service_place);?></b>
            </div>
            <div class="header-right-info pull-right clearfix">
                <div class="single-header-info">
                    <div class="icon-box">
                        <div class="inner-box">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                    <div class="content">
                        <h3>EMAIL</h3>
                        <p><?php echo html_escape(@$email->details);?></p>
                    </div>
                </div>
                <div class="single-header-info">
                    <div class="icon-box">
                        <div class="inner-box">
                            <i class="flaticon-telephone"></i>
                        </div>
                    </div>
                    <div class="content">
                        <h3>Call Now</h3>
                        <p><b> <?php echo html_escape(@$phone->details);?></b></p>
                    </div>
                </div>
            </div>


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
                                <?php 
                                if(isset($medicine_data['medicine'])){
                                foreach(@$medicine_data['medicine'] as $key => $val){?>
                                    <tr>
                                        <td><?php echo html_escape(@$val->medicine);?></td>
                                        <td><?php echo html_escape(@$val->harbs);?></td>
                                        <td><?php echo html_escape(@$val->comment);?></td>
                                    </tr>
                                <?php }
                                    }
                                ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-center"><?php echo html_escape(@$js_data->overall_comment);?></a>.</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        
                        <div itemscope="" itemtype="" class="grid-one-fourth attributionBlock">
                            <p id="signature"><?php echo display('Signature');?>............................</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    


        
        <div class="container">
            <div class="row footer">
                <p>  </p>
            </div>
        </div>

    </div>   