<script src="<?php echo base_url() ?>assets/dist/adminjs/sidebar.js" type="text/javascript"></script>

<?php
//query for logo 
$result = $this->db->select('*')->from('web_pages_tbl')->where('name', 'logo')->where('status', 1)->get()->row();

?>

<?php

$doctor_id = $this->session->userdata('doctor_id');

$doctor_info = $this->db->where('doctor_id', $doctor_id)->get('doctor_tbl')->row();

if (!empty($doctor_info)) {
    $img = $doctor_info->picture;
} else {
    $img = base_url() . 'assets/uploads/users/user.png';
}

?>
<!-- =============================================== -->
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <a href="<?php echo base_url(); ?>admin/Dashboard" class="logo">
            <!-- Logo -->
            <span class="logo-mini">
                <img src="<?php echo html_escape(@$result->picture); ?>" alt="">
            </span>
            <span class="logo-lg">
                <img src="<?php echo html_escape(@$result->picture); ?>" alt="">
            </span>
        </a>
        <!-- Sidebar user panel -->
        <div class="user-panel text-center">
            <a href="<?= base_url() . 'admin/Basic_controller/profile'; ?>">
                <div class="image">
                    <img src="<?php echo htmlspecialchars_decode(@$img); ?>" class="img-circle" alt="User Image">
                </div>
                <div class="info">
                    <p><?php echo $doctor_info->doctor_name; ?></p>

                </div>
            </a>
        </div>
        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <li class="dash">
                <a href="<?php echo base_url(); ?>admin/Dashboard"><i class="fa fa-dashboard"></i> <strong><?php echo display('deashbord'); ?></strong>
                </a>
            </li>
            <li class="treeview appointment">
                <a href="#">
                    <i class="fa fa-codepen" aria-hidden="true"></i><strong><?php echo display('appointment') ?></strong>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>admin/Appointment_controller"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('create_appointment') ?></a></li>
                    <li><a href="<?php echo base_url() ?>admin/Appointment_controller/appointment_list"> <i class="fa fa-list" aria-hidden="true"></i> <?php echo display('appointment_list') ?></a></li>
                </ul>
            </li>

            <li class="treeview patient">
                <a href="#">
                    <i class="fa fa-child" aria-hidden="true"></i><strong><?php echo display('patient') ?></strong>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>create_new_patient"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('add_new_patient') ?></a></li>
                    <li><a href="<?php echo base_url(); ?>patient_list"> <i class="fa fa-list" aria-hidden="true"></i> <?php echo display('patient_list') ?></a></li>
                </ul>
            </li>

            <li class="dash">
                <a href="<?php echo base_url(); ?>admin/Dashboard"><i class="fa fa-dashboard"></i> <strong>Prescriptions</strong>
                </a>
            </li>
            <li class="dash">
                <a href="<?php echo base_url(); ?>admin/Dashboard"><i class="fa fa-dashboard"></i> <strong>Finances</strong>
                </a>
            </li>
            <li>
                <hr>
            </li>

            <li class="treeview patient">
                <a href="#">
                    <i class="fa fa-child" aria-hidden="true"></i><strong>Settings</strong>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <li class="treeview Doctor">
                        <a href="#">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i><strong><?php echo display('doctor') ?></strong>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>admin/Doctor_controller/add_new_doctor"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('create_doctor') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Doctor_controller/doctor_list"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('doctor_list') ?> </a></li>
                        </ul>
                    </li>
                    <li class="treeview clinics">
                        <a href="#">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i><span><?php echo display('clinics') ?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>admin/Clinic_controller/clinic_create"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('create_clinic') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Clinic_controller"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('clinics_list') ?> </a></li>
                        </ul>
                    </li>
                    <li class="treeview procedures">
                        <a href="#">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i><span><?php echo display('procedures') ?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>admin/Procedure_controller/procedure_create"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('create_procedure') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Procedure_controller"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('procedures_list') ?> </a></li>
                        </ul>
                    </li>
                    <li class="treeview surgeries">
                        <a href="#">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i><span><?php echo display('surgeries') ?></span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>admin/Surgeries_controller/surgery_create"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('create_surgeries') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Surgeries_controller"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('surgeries_list') ?> </a></li>
                        </ul>
                    </li>
                    <li class="treeview Invoice">

                        <a href="#">
                            <i class="fa fa-list"></i><span>Invoice</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>admin/Invoice"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('add_new_invoice') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Invoice/invoice_list"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('invoice_list') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Service"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('add_service') ?> </a></li>
                        </ul>
                    </li>
                    <li class="treeview schedule">
                        <a href="#">
                            <i class="fa fa-weixin" aria-hidden="true"></i><span><?php echo display('schedule') ?> </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>admin/Schedule_controller/add_schedule"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('add_schedule') ?></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Schedule_controller/schedule_list"> <i class="fa fa-list" aria-hidden="true"></i> <?php echo display('schedule_list') ?></a></li>
                        </ul>
                    </li>
                    <li class="treeview emergency_stop">
                        <a href="#">
                            <i class="fa fa-hand-paper-o" aria-hidden="true"></i><span><?php echo display('emergency_stop') ?> </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>admin/Emergency_stop_controller/emergency_stop_list"> <i class="fa fa-list" aria-hidden="true"></i> <?php echo display('emergency_stop_list') ?></a></li>
                        </ul>
                    </li>
                    <li class="treeview setup_data">
                        <a href="#">
                            <i class="fa fa-bar-chart-o fa-fw"></i><span> <?php echo display('setup_data') ?> </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>admin/Setup_controller/add_language" class="nav-link"> Add Laguage </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Setup_controller/add_section" class="nav-link"> Add Section </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Setup_controller/add_disease" class="nav-link"> Add Disease </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Setup_controller/add_category" class="nav-link"> Add Category </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Setup_controller/add_classification" class="nav-link"> Add Classification </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Setup_controller/add_medicine" class="nav-link"> Add Medicine </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Setup_controller/medicine_List" class="nav-link"> <?php echo display('medicine_List') ?></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Setup_controller/add_herbs" class="nav-link"> Add Herbs</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Setup_controller/add_medicine_herbs" class="nav-link"> Add Medicine Herbs</a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Setup_controller/medicine_herbs_list" class="nav-link"> Herbs Medicine List</a></li>
                        </ul>
                    </li>
                    <li class="treeview users">
                        <a href="#">
                            <i class="fa fa-cogs" aria-hidden="true"></i><span> <?php echo display('users') ?> </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>admin/Users_controller/create_new_user" class="nav-link"><?php echo display('add_new_user') ?></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Users_controller/user_list" class="nav-link">User List</a></li>
                        </ul>
                    </li>
                    <li class="treeview web_setting">
                        <a href="#">
                            <i class="fa fa-cogs" aria-hidden="true"></i><span> <?php echo display('web_setting') ?> </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>admin/Web_setup_controller/header_setting" class="nav-link"><?php echo display('header_setup') ?></a></li>
                        </ul>
                    </li>
                    <li class="treeview sms_setup">

                        <a href="#">
                            <i class="fa fa-envelope" aria-hidden="true"></i><span> <?php echo display('sms_setup') ?> </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>




                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>admin/Sms_setup_controller/sms_gateway" class="nav-link"> <?php echo display('gateway') ?></a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Sms_setup_controller/sms_template" class="nav-link"> <?php echo display('sms_template') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Sms_setup_controller/sms_scheduler" class="nav-link"> <?php echo display('sms_schedule') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Sms_setup_controller/custom_sms" class="nav-link"> <?php echo display('send_custom_sms') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Sms_report_controller/custom_sms_list" class="nav-link"> <?php echo display('custom_sms_report') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/Sms_report_controller/auto_sms_list" class="nav-link"> <?php echo display('auto_sms_report') ?> </a></li>
                        </ul>
                    </li>
                    <li class="treeview email">

                        <a href="#">
                            <i class="fa fa-envelope" aria-hidden="true"></i><span> <?php echo display('email_setup') ?> </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>




                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>admin/email/Email/email_schedule_setup" class="nav-link"> <?php echo display('email_schedule_setup') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/email/Email/email_list" class="nav-link"> <?php echo display('email_list') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/email/Email/custom_email" class="nav-link"> <?php echo display('send_custom_email') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/email/Email/email_template_setup" class="nav-link"> <?php echo display('email_template') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/email/Email/template_list" class="nav-link"> <?php echo display('email_template_list') ?> </a></li>
                            <li><a href="<?php echo base_url(); ?>admin/email/Email/email_config_setup" class="nav-link"> <?php echo display('email_configaretion') ?></a></li>
                        </ul>
                    </li>


                </ul>
            </li>
            <li class="treeview web_setting">
                <a href="#">
                    <i class="fa fa-cogs" aria-hidden="true"></i><span> <?php echo display('print_pattern') ?> </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>admin/print_pattern/Print_pattern_controller/view_setup_list" class="nav-link"> <?php echo display('pattern_list') ?></a></li>
                </ul>
            </li>
            <li class="dash">
                <a href="<?php echo base_url(); ?>Language"><i class="fa fa-language" aria-hidden="true"></i> <span> <?php echo display('language_setting') ?></span>
                </a>
            </li>
            <li class="dash">
            <a href="<?= base_url() ?>logout"><i class="fa fa-sign-out fa-fw"></i> Logout </a>
            </li>


        </ul>
    </div> <!-- /.sidebar -->
</aside>