
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1>Invoice Setup</h1>
            <small>Invoice Setup</small>
            
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
    
        <div class="row">

        <div class="col-sm-12">

            <div  class="panel panel-bd ">

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 table-responsive">
                                <?php echo form_open('admin/user/Invoice/save_invoice',array('name'=>'invo'));?>
         
                                <table class="table table-striped">
                                    <tfoot>
                                        <tr>  
                                            <th width="40%">
                                                <ul class="list-unstyled"> 
                                                    <li>
                                                        <strong><?php echo display('phone')?></strong>
                                                        <input required="" autocomplete="off" name="phone" id="phone" class="invoice-input" type="text">
                                                        <p class="text-center text-danger  invlid_patient_id">Patient Phone</p>
                                                    </li>   
                                                    <li><strong>Full Name</strong>
                                                        <input class="invoice-input" id="patient_name" type="text">
                                                    </li>  
                                                    <li> 
                                                    <strong>Address&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                                                        <input class="invoice-input" id="patient_address" type="text">
                                                    </li>  
                                                    <input type="hidden" name="patient_id" id="patient_id" value="">
                                                </ul>
                                            </th> 

                                            <th class="text-center" width="20%"> 
                                                <strong >Invoice</strong> 
                                            </th>  

                                            <th width="40%">
                                                <h4>
                                                    Date :  
                                                    <input name="date" required="" value="" class="datepicker1" id="" type="text"><br> 
                                                    
                                                </h4>
                                            </th> 
                                        </tr>
                                    </tfoot>
                                </table>
                                <table id="invoice" class="table table-striped"> 
                                    <thead>

                                        <tr class="bg-primary">
                                            <th></th>
                                            <th></th>
                                            <th>Doctor Name</th>
                                            <th>Payment notes</th>
                                            <th width="120">Fee</th> 
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="2"> </td>
                                            <td>
                                                <select name="doctor_id" class=" form-control" required="">
                                                <option value="" >Select Doctor</option>
                                                <?php foreach($doctor as $value){?>
                                                <option value="<?php echo html_escape($value->doctor_id)?>"><?php echo html_escape($value->doctor_name)?></option>
                                                <?php }?>
                                                </select>
                                            </td> 

                                            <td><textarea name="payment_notes" class="form-control" placeholder="Payment Notes"></textarea></td> 

                                            <td><input name="fee" required="" autocomplete="off" id="fee" name="doctor_fee" class="form-control" placeholder="Fee" type="text"></td>  
                                            
                                            
                                        </tr>  
                                    </tbody>
                                    <tfoot> 
                                       
                                        <tr>  

                                            <th colspan="3" class="text-right">
                                                <select name="payment_method" class=" form-control" required="">
                                                <option value="" >Select Payment Method</option>
                                                    <option value="visa_card">Visa Card</option>
                                                    <option value="msater_card">Master Card</option>
                                                    <option value="paypal">Paypal </option>
                                                </select>
                                            </th> 

                                            <td>
                                                <div class="input-group">
                                                  <div class="input-group-addon"> Vat %</div>
                                                  <input id="vatParcent" required="" name="m_tax" autocomplete="off" class="form-control" value="0" type="text">
                                                </div>
                                            </td> 
                                            <td><input name="vat" id="vat" required="" autocomplete="off" class="vatDiscount paidDue form-control" placeholder="Vat" value="0.00" type="text"></td>  
                                            <td></td> 
                                        </tr>


                                        <tr>  
                                            <th colspan="3" class="text-right">
                                            <textarea name="payment_method_notes" class="form-control" placeholder="Payment method Notes"></textarea>
                                            </th> 
                                            <td>
                                                <div class="input-group">
                                                  <div class="input-group-addon">Discount %</div>
                                                  <input id="discountParcent" name="m_discount" required="" autocomplete="off" class=" form-control" value="0" type="text">
                                                </div>
                                            </td> 

                                            <td><input name="discount" required="" autocomplete="off" id="discount" class="vatDiscount paidDue form-control" placeholder="Discount" value="0.00" type="text"></td> 
                                            <td></td>  
                                        </tr> 
                                        <tr class="bg-success">  
                                            <td colspan="3"></td>  
                                            <th class="text-right">Grand Total</th>  
                                            <th><input name="grand_total" readonly="" required="" autocomplete="off" id="grand_total" class="paidDue form-control" placeholder="Grand Total" value="0.00" type="text"></th> 
                                            <td></td>  
                                        </tr>
                                        <tr>  
                                            <td colspan="3"></td>  
                                            <th class="text-right">Paid</th>
                                            <td><input name="paid" id="paid" autocomplete="off" class="paidDue form-control" required="" placeholder="Paid" value="0.00" type="text"></td> 
                                            <td></td>  
                                        </tr>
                                        <tr class="bg-danger">  
                                            <td colspan="3"></td>  
                                            <th class="text-right">Due</th> 
                                            <td><input name="due" id="due" autocomplete="off" class="paidDue form-control" required="" placeholder="Due" value="0.00" type="text"></td> 
                                            <td></td>  
                                        </tr>
                                        <tr>  
                                            <td colspan="3">
                                                
                                            </td>  
                                            <td><button type="reset" class="btn btn-info btn-block">Reset</button></td>  
                                            <td><button class="btn btn-success btn-block">Save</button></td>  
                                            <td></td> 
                                        </tr>
                                    </tfoot>
                                </table>  
                            </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </section>
</div>



<?php $this->load->view('admin/admin_script.php');?>

