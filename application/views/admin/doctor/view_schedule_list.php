
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
				<div class="header-icon">
						<i class="pe-7s-world"></i>
				</div>
				<div class="header-title">
						<h1><?php echo display('schedule_list');?></h1>
						<small><?php echo display('schedule_list');?></small>
						
				</div>
		</section>

		<!-- Main content -->
		<section class="content">
					<div class="row">
		<!--  table area-->
						 <div class="col-sm-12">
								<?php 
										$del_msg = $this->session->userdata('del_msg');
										$msg = $this->session->userdata('message');

										if($del_msg !=''){
												echo "<div class='alert alert-success msg'>".html_escape($del_msg)."</div><br>";
												$this->session->unset_userdata('del_msg');
										}
										 if($msg !=''){
												echo "<div class='alert alert-success msg'>".html_escape($msg)."</div><br>";
												$this->session->unset_userdata('message');
										}


										function day($day){
        if($day == 1){
            return $day = "Saturday";
        }
        elseif ($day == 2) {
            return $day = "Sunday";
        }elseif ($day == 3) {
            return $day = "Monday";
        }elseif ($day == 4) {
            return $day = "Tuesday";
        }elseif ($day == 5) {
            return $day = "Wednesday";
        }elseif ($day == 6) {
            return $day = "Thusday";
        }else {
            return $day = "Friday";
        }
    }
								?>
										<div  class="panel panel-bd">
											<div class="panel-body">
												<div class="table-responsive order-table">
													<table width="100%" class="table table table-striped table-bordered table-hover" id="dataTables">
														<thead>
															<tr>
																<th >#SL</th>
																<th ><?php echo display('doctor_name');?> </th>
																<th ><?php echo display('day');?> </th>
																<th ><?php echo display('start_time');?> </th>
																<th ><?php echo display('end_time');?> </th>
																<th ><?php echo display('set_per_patient_time');?> </th>
																<th ><?php echo display('action');?> </th>
															</tr>

														</thead>
														<tbody>

																<?php
																$i = 1;
																	if(!empty($schedul_info))
																	 foreach ($schedul_info as $value) {
																?>
																<tr>
																		<td><?php echo $i++;?></td>
																		<td><?php echo html_escape($value->doctor_name);?></td>
																		<td><?php echo html_escape(day($value->day));?></td>
																		<td><?php echo html_escape($value->start_time);?></td>
																		<td><?php echo html_escape($value->end_time);?></td>
																		<td><?php echo html_escape($value->per_patient_time);?></td>

																		<td class="text-right">
																			<a href="<?php echo base_url();?>admin/doctor/Schedule_controller/schedul_edit/<?php echo html_escape($value->schedul_id);?>" class="btn btn-xs btn-info">
																				<i class="fa fa-edit"></i></a>
																				<a href="<?php echo base_url();?>admin/doctor/Schedule_controller/schedul_delete/<?php echo html_escape($value->schedul_id);?>" class="btn btn-xs btn-danger">
																				<i class="fa fa-trash"></i></a>
																		</td>
																</tr>
																<?php
																		 }
																?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
								</div>
				</div>           
		</section>
</div>






