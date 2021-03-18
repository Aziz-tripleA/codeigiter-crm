
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('invoice_recit')?></h1>
            <small><?php echo display('invoice_recit')?></small>
           
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
    
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
        $address = $this->db->select('*')
                ->from('web_pages_tbl')
                ->where('name','address')
                ->get()
                ->row();        
              
    ?>
    <div class="row">

        <div class="col-sm-12">
        <?php
            $msg = $this->session->flashdata('message');
            if($msg){
                echo htmlspecialchars_decode($msg);
            } 
        ?>

            <div class="panel panel-bd">

                <div id="printableArea">
                    <div class="panel-body">
                        <div class="row">
                                
                            <div class="col-sm-8" >
                                <img src="<?php echo html_escape(@$logo->picture);?>" class="img img-responsive">
                                    <br>
                                    <span class="label label-success-outline m-r-15 p-10"><?php echo display('billing_from')?></span>
                                    <address >
                                        <strong></strong>
                                        <?php echo html_escape(@$address->details);?><br>
                                        <abbr><?php echo display('phone_number')?>:</abbr> <?php echo html_escape(@$phone->details);?><br>
                                        <abbr><?php echo display('email')?>:</abbr> 
                                        <?php echo html_escape(@$email->details);?><br>
                                        
                                    </address>
                                </div>
                                
                                <div class="col-sm-4 text-left" >
                                    
                                    <div><?php echo display('invoice_no')?>: <?php echo html_escape(@$invo->invoice_id);?></div>
                                    <div class="m-b-15"><?php echo html_escape(@$invo->date_time);?></div>

                                    <span class="label label-success-outline m-r-15"><?php echo display('billing_to')?></span>

                                    <address >  
                                         <strong> <?php echo html_escape(@$invo->family_name);?></strong><br>
                                        <abbr><?php echo display('address')?>:</abbr>
                                        <p >
                                            <?php echo htmlspecialchars_decode($invo->address);?>
                                        </p>
                                        <abbr><?php echo display('phone_number')?>:</abbr>
                                            <?php echo htmlspecialchars_decode($invo->patient_phone);?>
                                        <br>
                                        <abbr><?php echo display('email')?>:</abbr> 
                                            <?php echo htmlspecialchars_decode($invo->patient_email);?>
                                    </address>
                                </div>
                            </div> <hr>

                            <div class="table-responsive m-b-20">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('sl_no')?>.</th>
                                            <th><?php echo display('service_name')?></th>
                                            <th><?php echo display('quantity')?></th>
                                            <th><?php echo display('rate')?></th>
                                            <th><?php echo display('discount')?></th>
                                            <th><?php echo display('amount')?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                        <?php 
                                        $i = 1;
                                        foreach($invo_product as $product){
                                        ?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><div><strong><?php echo html_escape(@$product->service_name);?></strong></div></td>
                                            <td><?php echo html_escape(@$product->quantity);?></td>
                                            <td><?php echo html_escape(@$product->price);?></td>
                                            <td><?php echo html_escape(@$product->discount);?></td>
                                            <td><?php echo html_escape(@$product->grand_price);?></td>
                                        </tr>
                                        <?php }?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-8" >
                                        <p><?php echo html_escape($invo->payment_notes);?></p>
                                        <p><strong>Thank you very much for choosing us.</strong></p>
                                    </div>

                                    <div class="col-sm-4" >

                                        <table class="table">
                                            <tbody>

                                                <tr>
                                                    <th ><?php echo display('tex')?> : </th>
                                                    <td ><?php echo html_escape(@$invo->total_tax);?> </td>
                                                </tr>
                                                <tr>
                                                    <th class="grand_total"><?php echo display('grand_total')?>:</th>
                                                    <td class="grand_total"><?php echo html_escape($invo->grand_total);?></td>
                                                </tr>
                                                <tr>
                                                    <th ><?php echo display('paid_ammount')?> : </th>
                                                    <td ><?php echo html_escape(@$invo->paid);?></td>
                                                </tr>                
                                                <tr>
                                                    <th><?php echo display('due')?> : </th>
                                                    <td><?php echo html_escape(@$invo->due);?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div>
                                        <?php echo display('authorised_by')?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="panel-footer text-left">
                        <a class="btn btn-info" href="#" onclick="printContent('printableArea')"><span class="fa fa-print"></span></a>
                    </div>
                </div>
            </div>

    </div>            
    </section>
</div>




