
<!-- Invoice js -->
<script src="<?php echo base_url()?>assets/my-assets/service.js.php" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/my-assets/invoice.js" type="text/javascript"></script>
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>

        <div class="header-title">
            <h1><?php echo display('edit_invoice')?></h1>
            <small><?php echo display('edit_invoice')?></small>
            
        </div>

    </section>


    <!-- Main content -->
    <section class="content">
    
        <?php
            $msg = $this->session->flashdata('message');
            if($msg){
                echo htmlspecialchars_decode($msg);
            } 
        ?>

        <div class="row">
            <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('edit_invoice')?></h4>
                        </div>
                    </div>

                    <?php 
                    $att = array('name'=>'insert_invoice','class'=>'form-vertical','id'=>'insert_invoice');
                    echo form_open('admin/Invoice/update_invoice',$att);
                    ?>

                    <div class="panel-body">
                    <input type="hidden" value="<?php echo $invo->invoice_id;?>" name="invoice_id">
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group row">
                                    <label for="customer_name" class="col-sm-5"><?php echo display('phone_number')?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-7">
                                        <input required="" autocomplete="off" value="<?php echo html_escape($invo->patient_phone);?>" name="phone" id="phone" class="form-control" type="text">
                                        <span id="csc" class="text-center invlid_patient_id"><?php echo display('phone_number')?></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="customer_name" class="col-sm-5"><?php echo display('patient_name')?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-7">
                                        <input required="" value="<?php echo html_escape($invo->family_name);?>" name="patient_name" id="patient_name" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="customer_name" class="col-sm-5"><?php echo display('address')?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-7">
                                        <input required="" name="address" id="address" value="<?php echo html_escape($invo->address);?>" class="form-control" type="text">
                                    </div>
                                </div>

                                <input type="hidden" value="<?php echo html_escape($invo->patient_id);?>" name="patient_id" id="patient_id">

                            </div>
                          
                            <div class="col-md-6">
                                
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php echo display('date')?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" size="50" name="date" id="date" required="" value="<?php echo html_escape($invo->date_time);?>" type="text">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php echo display('doctor')?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <select name="doctor_id" class=" form-control" required="">
                                        <option value="" ><?php echo display('doctor')?></option>
                                            <?php foreach($doctor as $value){?>
                                                <option value="<?php echo html_escape($value->doctor_id)?>" <?php echo ($value->doctor_id==$invo->doctor_id?'selected':'')?>><?php echo $value->doctor_name?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                    <tr>
                                        <th class="text-center"><?php echo display('service_info')?> <i class="text-danger">*</i></th>
                                        <th class="text-center"><?php echo display('quantity')?> <i class="text-danger">*</i></th>
                                        <th class="text-center"><?php echo display('price')?> <i class="text-danger">*</i></th>
                                        <th class="text-center"><?php echo display('discount')?> </th>
                                        <th class="text-center"><?php echo display('total')?> <i class="text-danger">*</i></th>
                                        <th class="text-center"><?php echo display('action')?></th>
                                    </tr>
                                </thead>
                                <tbody id="addinvoiceItem">

                                <?php 
                                    $i=1;
                                    foreach($invo_product as $value){
                                ?>

                                    <tr>
                                    <input type="hidden" name="inv_p_id[]" value="<?php echo html_escape(@$value->inv_p_id);?>">
                                        
                                        <td>
                                            <input name="product_name" value="<?php echo $value->service_name;?>" onkeypress="invoice_productList(<?php echo $i?>);" class="form-control productSelection" placeholder="Service Name" required="" id="product_name" type="text">
                                            <input class="autocomplete_hidden_value product_id_1" value="<?php echo html_escape(@$value->product_id);?>" name="product_id[]" id="SchoolHiddenId" type="hidden">
                                            <input class="baseUrl" value="<?php echo base_url();?>" type="hidden">
                                        </td>
                                       

                                        <td>
                                            <input name="product_quantity[]" onkeyup="quantity_calculate(<?php echo $i?>);" onchange="quantity_calculate(<?php echo $i?>);" id="total_qntt_<?php echo $i;?>" class="form-control text-right" value="<?php echo html_escape($value->quantity);?>" min="1" type="number">
                                        </td>

                                        <td>
                                            <input name="product_rate[]" readonly="" value="<?php echo html_escape($value->price);?>" id="price_item_<?php echo $i;?>" class="price_item1 form-control text-right" type="text">
                                        </td>

                                        <!-- Discount -->
                                        <td>
                                            <input name="discount[]" onkeyup="quantity_calculate(<?php echo $i?>);" onchange="quantity_calculate(<?php echo $i?>);" id="discount_<?php echo $i;?>" class="form-control text-right" placeholder="Discount" value="<?php echo $value->discount;?>" min="0" type="number">
                                        </td>
                                       
                                        <td>
                                            <input class="total_price form-control text-right" name="total_price[]" id="total_price_<?php echo $i;?>" value="<?php echo html_escape($value->grand_price);?>" tabindex="-1" readonly="readonly" type="text">
                                        </td>

                                        <td>
                                            <!-- Tax calculate start-->
                                            <input id="total_tax_<?php echo $i;?>" class="total_tax_1" value="<?php echo html_escape($value->tax);?>" type="hidden">
                                            <input id="all_tax_<?php echo $i;?>" class="total_tax" value="<?php echo html_escape($value->tax);?>" type="hidden">
                                            <!-- Tax calculate end -->
                                            <button  class="btn btn-danger" type="button" value="Delete" onclick="deleteRow(this)"><?php echo display('delete')?></button>
                                        </td>

                                    </tr>

                                    <?php 
                                    $i++;
                                    }
                                     ?>

                                <tfoot>

                                    <tr>
                                        <td  colspan="4"><b><?php echo display('total_tax')?>:</b></td>
                                        <td class="text-right">
                                            <input id="total_tax_ammount" tabindex="-1" class="form-control text-right" name="total_tax" value="<?php echo html_escape($invo->total_tax);?>" readonly="readonly" type="text">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" ><b><?php echo display('grand_total')?>:</b></td>
                                        <td class="text-right">
                                            <input id="grandTotal" tabindex="-1" class="form-control text-right" name="grand_total_price" value="<?php echo html_escape($invo->grand_total);?>" readonly="readonly" type="text">
                                        </td>
                                    </tr>

                                    <tr>
                                        
                                        <td  colspan="4"><b><?php echo display('paid_ammount')?>:</b></td>
                                        <td class="text-right">
                                            <input id="paidAmount" onkeyup="invoice_paidamount();" tabindex="-1" class="form-control text-right" name="paid_amount" value="<?php echo html_escape($invo->paid);?>" type="text">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td  colspan="4"><b><?php echo display('due')?>:</b></td>
                                        <td class="text-right">
                                            <input id="dueAmmount" class="form-control text-right" name="due_amount" value="<?php echo html_escape($invo->due);?>" readonly="readonly" type="text">
                                        </td>
                                    </tr>

                                </tfoot>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-8">

                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php echo display('payment_notes')?> </label>
                                    <div class="col-sm-8">
                                        <textarea name="payment_notes" class="form-control" placeholder="Payment Notes"><?php echo html_escape($invo->payment_notes);?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Select payment method </label>
                                    <div class="col-sm-8">
                                        <select name="payment_method" class=" form-control" >
                                        <option value="master_card" >Master Card</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php echo display('payment_method_notes')?></label>
                                    <div class="col-sm-8">
                                        <textarea name="payment_method_notes" class="form-control" placeholder="<?php echo display('payment_method_notes')?>"><?php echo html_escape(@$invo->payment_method_notes);?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-offset-4 col-sm-4">
                                <input id="add-invoice" class="btn btn-success" name="add-invoice" value="<?php echo display('save_and_paid')?>" type="submit">
                            </div>
                        </div>
                    </div>
                   <?php echo form_close();?>
                </div>
            </div>
        </div>

        </div>  

    </section>
</div>


