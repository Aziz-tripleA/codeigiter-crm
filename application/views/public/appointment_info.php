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

    $logo = $this->db->select('*')
            ->from('web_pages_tbl')
            ->where('name','logo')
            ->get()
            ->row();

        $timezone = $this->db->select('*')
            ->from('web_pages_tbl')
            ->where('name','timezone')
            ->get()
            ->row();  
        $google_map = $this->db->select('*')
            ->from('web_pages_tbl')
            ->where('name','google_map')
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
        <title> Appointment information </title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- flaticon -->
        <link href="<?php echo base_url(); ?>assets/public_css/flaticon.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff" rel="stylesheet">
        <!-- font-awesome -->
        <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- style -->
        <link href="<?php echo base_url(); ?>assets/public_css/appointment_style.css" rel="stylesheet">
        <!-- coustome style -->
        <link href="<?php echo base_url();?>assets/dist/css/coustom_css.css" rel="stylesheet">
       
    </head>

    <body>

    <div id="PrintMe">
        <div class="container">
            <div class="row top-bar">
                <div class="left-text pull-left">
                    <p><b><?php echo display('date')?> : <?php echo html_escape(@$print->get_date_time);?></p>
                </div>  

                <div class="social-icons pull-right">
                    <ul>
                        <li><a href="" onclick="printContent('PrintMe')" title="Print">Print</a></li>
                    </ul>
                </div> 
            </div>
        </div>
        <div class="container header">

            <div class="logo pull-left">
                <a href="#">
                    <img src="<?php echo html_escape(@$logo->picture);?>" class="img-responsive" alt="Awesome Image">
                </a>
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
                        <p><?php echo html_escape($email->details);?></p>
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
                        <p><b><?php echo html_escape($phone->details);?></b></p>
                    </div>
                </div>
                
            </div>


        </div>
            <section>
                <div class="container">
                    <div class="row information">
                        <div class="sec-title colored text-center">
                            <h2>Patient Information</h2>
                            <span class="decor">
                                <span class="inner"></span>
                            </span>
                        </div>

                        <?php
                            if(!empty($print->picture)){
                                $pimg = $print->picture;
                            }else{
                                $pimg=base_url('assets/images/male.png');
                            }


                             $Payment = $this->db->select('*')
                                     ->from('payment_table')
                                     ->where('appointment_id',$print->appointment_id)
                                     ->get()
                                     ->row();
                        ?>
                        <div class="col-sm-6">
                            <div class="google_map pimg">
                                <img src="<?php echo html_escape($pimg)?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="information-details">
                                <ul>
                                    <li>Name :<span class="pull-right"><?php echo html_escape(@$print->family_name) .' '. html_escape(@$print->given_name) ;?></span></li>
                                    <li>Appointment Id :<span class="pull-right"><?php echo html_escape(@$print->appointment_id);?></span></li>
                                    <li>Patient Id :<span class="pull-right"><?php echo html_escape(@$print->patient_id);?></span></li>
                                    <li>Date :<span class="pull-right"><?php echo date('d M, Y' , strtotime(@$print->date)) ;?></span></li>
                                    <li>Time :<span class="pull-right"><?php echo html_escape(@$print->sequence);?></span></li>
                                    <li>Doctor :<span class="pull-right"><?php echo html_escape(@$print->doctor_name);?></span></li>
                                    <li>Department :<span class="pull-right"><?php echo html_escape(@$print->department);?></span></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>

            
            <div class="container">
                <div class="row footer">
                    <div class="paypal-div" >
                        Pay with paypal
                        <?php if(empty($Payment)){ ?>
                            <a target="_blank" href="<?php echo base_url();?>admin/payment_method/Payment/pay_with_doctor/<?php echo html_escape($print->appointment_id);?>">
                            <img class="paypal-img" src="<?php echo base_url()?>assets/images/paypal.png" class="img-responsive" width="150" alt=""></a>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>

        <!-- jQuery -->
        <script src="<?php echo base_url()?>assets/plugins/jQuery/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/print_preview.js" type="text/javascript"></script>
        

    </body>
</html>