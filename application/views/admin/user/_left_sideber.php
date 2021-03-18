<script src="<?php echo base_url()?>assets/dist/adminjs/sidebar.js" type="text/javascript"></script>

<?php 
    $user_id = $this->session->userdata('user_id');
    $userinfo = $this->db->where('user_id',$user_id)->get('users_tbl')->row();

    if($userinfo->picture){
        $img = $userinfo->picture;
    }else{
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
                            <p><?php echo $this->session->userdata('name'); ?></p>
                             <p class="text-success"><i class="fa fa-circle text-success"></i> Online</p>
                        </div>
                    </div>

                    <!-- sidebar menu -->
                    <ul class="sidebar-menu">

                        <li class="treeview patient ">
                            <a href="#">
                                <i class="fa fa-child" aria-hidden="true"></i><span><?php echo display('patient')?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>

                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url()?>admin/user/Patient_controller/create_new_patient"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('add_new_patient')?></a></li>
                                <li><a href="<?php echo base_url();?>admin/user/Patient_controller/patient_list"> <i class="fa fa-list" aria-hidden="true"></i> <?php echo display('patient_list')?></a></li>
                            </ul>
                        </li> 


                        <li class="treeview appointment ">
                            <a href="#">
                                <i class="fa fa-codepen" aria-hidden="true"></i><span><?php echo display('appointment')?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url()?>admin/user/Appointment_controller"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('create_appointment')?></a></li>
                                <li><a href="<?php echo base_url()?>admin/user/Appointment_controller/appointment_list"> <i class="fa fa-list" aria-hidden="true"></i> <?php echo display('appointment_list')?></a></li>
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
                                <li><a href="<?php echo base_url();?>admin/user/Invoice"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('add_new_invoice')?> </a></li>
                                <li><a href="<?php echo base_url();?>admin/user/Invoice/invoice_list"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('invoice_list')?> </a></li>
                                <li><a href="<?php echo base_url();?>admin/user/Service"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('add_service')?> </a></li>
                            </ul>
                        </li>

                   </ul>
                </div> <!-- /.sidebar -->
            </aside>
      