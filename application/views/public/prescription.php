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


<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Prescription </title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- flaticon -->
        <link href="<?php echo base_url(); ?>assets/public_css/flaticon.css" rel="stylesheet">
        <!-- font-awesome -->
        <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!-- style -->
        <link href="<?php echo base_url(); ?>assets/public_css/appointment_style.css" rel="stylesheet">
        <!-- coustome style -->
        <link href="<?php echo base_url();?>assets/dist/css/coustom_css.css" rel="stylesheet">
 
    </head>

<body>

<?php 
    @$js_data = json_decode($prescription->data);
    @$medicine_data =  (array) $js_data->medicine_data;
?>

<div id="PrintMe">
        <div class="container">
            <div class="row top-bar">
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
                    <ul>
                        <li><a href="" onclick="printContent('PrintMe')" title="Print"><i class="fa fa-print"></i></a></li>
                    </ul>
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
                <div class="single-header-info" >
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
                        <p><b>  <?php echo html_escape(@$phone->details);?></b></p>
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
 
    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/plugins/jQuery/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/print_preview.js" type="text/javascript"></script>



    </body>
</html>