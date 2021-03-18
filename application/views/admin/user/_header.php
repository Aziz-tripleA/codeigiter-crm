<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo (html_escape(@$title))?html_escape(@$title):'User panel'?></title>
        
        <?php 
            //query for logo 
            $result = $this->db->select('*')->from('web_pages_tbl')->where('name','fabicon')->where('status',1)->get()->row();
        ?>
        <!-- favicon -->
        <link rel="icon" href="<?php echo (!empty(html_escape($result->picture))?html_escape($result->picture):null); ?>" sizes="16x16"> 
        <!-- jquery-ui css -->
        <link href="<?php echo base_url()?>assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap -->
        <link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Lobipanel css -->
        <link href="<?php echo base_url()?>assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
        <!-- Font Awesome -->
        <link href="<?php echo base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <!-- Pe-icon -->
        <link href="<?php echo base_url()?>assets/plugins/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url()?>assets/plugins/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
        <!-- DataTables CSS -->
        <link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.min.css" rel="stylesheet" type="text/css"/>
        <!-- datepiker -->
        <link href="<?php echo base_url()?>assets/plugins/ui-datetimepicker/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css"/>
        <!-- summernote css -->
        <link href="<?php echo base_url()?>assets/plugins/summernote/summernote.css" rel="stylesheet" type="text/css"/>
        
        <link href="<?php echo base_url()?>assets/plugins/toastr/toastr.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style -->
        <link href="<?php echo base_url()?>assets/dist/css/styleBD.css" rel="stylesheet" type="text/css"/>
        <!-- jQuery -->
        <script src="<?php echo base_url()?>assets/plugins/jQuery/jquery.min.js" type="text/javascript"></script>

    </head>

<?php 
    $result = $this->db->select('*')->from('web_pages_tbl')->where('name','logo')->where('status',1)->get()->row();
?>

    <body class="hold-transition sidebar-mini">
    
    <div class="se-pre-con"></div>
        <!-- Site wrapper -->
        <div class="wrapper">

            <input type="hidden" id="base_url" value="<?php echo base_url()?>">
            <input type="hidden" id="segment1" value="<?php echo $this->uri->segment(1); ?>">
            <input type="hidden" id="segment2" value="<?php echo $this->uri->segment(2); ?>">
            <input type="hidden" id="segment3" value="<?php echo $this->uri->segment(3); ?>">


            <header class="main-header"> 
                <a href="<?php echo base_url();?>admin/user/Appointment_controller" class="logo"> <!-- Logo -->
                    <span class="logo-mini">
                        <img src="<?php echo html_escape(@$result->picture);?>" alt="">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo html_escape(@$result->picture);?>" alt="">
                    </span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
                        <span class="sr-only">Toggle navigation</span>
                        <span class="pe-7s-keypad"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- settings -->
                            <li class="dropdown dropdown-user">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-cogs"></i></a>
                                <ul class="dropdown-menu">

                                <li>
                                    <a href="<?php echo base_url();?>admin/user/Users_controller/update_profile"><i class="fa fa-user"></i><?php echo display('profile');?></a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url();?>admin/user/Setting_controller/password_change"><i class="fa fa-lock"></i><?php echo display('change_password');?></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>logout"><i class="fa fa-sign-out"></i><?php echo display('logout');?> </a>
                                </li>
                                </ul>
                            </li>
                        </ul>
   
                    </div>
                </nav>
            </header>

