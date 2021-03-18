<script src="<?php echo base_url()?>assets/dist/adminjs/sidebar.js" type="text/javascript"></script>

<?php
    $doctor_id = $this->session->userdata('doctor_id');
    $doctor_info = $this->db->where('doctor_id', $doctor_id)->get('doctor_tbl')->row();
    if ($this->session->userdata('doctor_picture')) {
        $img = $doctor_info->picture;
    } else {
        $img = base_url().'assets/uploads/users/user.png';
    }
?>

            <aside class="main-sidebar">
                <!-- sidebar -->
                <div class="sidebar">
                <!-- Sidebar user panel -->

                    <div class="user-panel text-center">
                        <div class="image">
                            <img src="<?php echo html_escape($img);?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="info">
                            <p><?php echo $this->session->userdata('doctor_name'); ?></p>
                            <p class="text-success"><i class="fa fa-circle text-success"></i> Online</p>
                        </div>
                    </div>

                   
                    <!-- sidebar menu -->
                    <ul class="sidebar-menu">

                        <li class="active">
                            <a href="<?php echo base_url();?>admin/doctor/Dashboard"><i class="fa fa-dashboard"></i> <span><?php echo display('deashbord');?></span>
                            </a>
                        </li>

                        <!-- <li class="treeview pres">

                            <a href="#">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i><span><?php echo display('prescription')?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>

                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url();?>admin/doctor/Prescription_controller/prescription_list"> <i class="fa fa-list" aria-hidden="true"></i> <?php echo display('prescription_list')?></a></li>
                            </ul>

                        </li>
 -->

                        <li class="treeview appointment">
                            <a href="#">
                                <i class="fa fa-codepen" aria-hidden="true"></i><span><?php echo display('appointment')?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url()?>admin/doctor/Appointment_controller"> <i class="fa fa-list" aria-hidden="true"></i> <?php echo display('create_appointment')?></a></li>
                                <li><a href="<?php echo base_url()?>admin/doctor/Appointment_controller/appointment_list"> <i class="fa fa-list" aria-hidden="true"></i> <?php echo display('appointment_list')?></a></li>
                            </ul>
                        </li>

                        <li class="treeview patient">
                            <a href="#">
                                <i class="fa fa-child" aria-hidden="true"></i><span><?php echo display('patient')?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url()?>admin/doctor/Patient_controller/create_new_patient"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('add_new_patient')?></a></li>
                                <li><a href="<?php echo base_url();?>admin/doctor/Patient_controller/patient_list"> <i class="fa fa-list" aria-hidden="true"></i> <?php echo display('patient_list')?></a></li>
                            </ul>
                        </li>

                        <li class="treeview Invoice">

                            <a href="#">
                                <i class="fa fa-list"></i><span><?php echo display('invoice')?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>

                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url();?>admin/doctor/Invoice"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('add_new_invoice')?> </a></li>
                                <li><a href="<?php echo base_url();?>admin/doctor/Invoice/invoice_list"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('invoice_list')?> </a></li>
                            </ul>
                        </li>

                        
                        <li class="treeview schedule">
                            <a href="#">
                               <i class="fa fa-weixin" aria-hidden="true"></i><span><?php echo display('schedule')?> </span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url();?>admin/doctor/Schedule_controller/add_schedule"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('add_schedule')?></a></li>
                                <li><a href="<?php echo base_url();?>admin/doctor/Schedule_controller/schedule_list"> <i class="fa fa-list" aria-hidden="true"></i> <?php echo display('schedule_list')?></a></li>
                            </ul>
                        </li>

                        <li class="treeview emergency_stop">
                            <a href="#">
                               <i class="fa fa-hand-paper-o" aria-hidden="true"></i><span><?php echo display('emergency_stop')?> </span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url();?>admin/doctor/Emergency_stop_controller"> <i class="fa fa-stop-circle" aria-hidden="true"></i> <?php echo display('emergency_stop_setup')?></a></li>
                                <li><a href="<?php echo base_url();?>admin/doctor/Emergency_stop_controller/emergency_stop_list"> <i class="fa fa-list" aria-hidden="true"></i> <?php echo display('emergency_stop_list')?></a></li>
                            </ul>
                        </li>

                   </ul>

                </div> <!-- /.sidebar -->
            </aside>