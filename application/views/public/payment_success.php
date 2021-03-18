<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo (!empty(html_escape(@$info->website_title->details))?html_escape(@$info->website_title->details):null); ?></title>
        <link rel="icon" href="<?php echo (!empty($info->fabicon->picture)?$info->fabicon->picture:null); ?>" sizes="16x16">

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



 <div id="div1">

     <div class="container" >
          <div class="row top-bar">
              <div class="left-text pull-left">
                  <p><?php echo date("Y-m-d h:i:s");?></p>
              </div>  
          </div>
      </div>
		

	
      <div class="container header">
        <div >
            <a href="<?php echo base_url();?>"><img src="<?php echo (!empty(html_escape($info->logo->picture))?html_escape($info->logo->picture):null); ?>" ></a>
        </div>
      </div>

		
		<div class="container inners">
            <table class="table table-bordered">
         
                  <tbody>
                    <tr>
                      <td>Patient Name</td>
                      <td><?php echo html_escape(@$patient->family_name)?></td>
                     
                    </tr>
                    <tr>
                      <td>Appointment Id </td>
                      <td><?php echo html_escape(@$payment_info->appointment_id)?></td>
                      
                    </tr>
                    <tr>
                      <td >Payment amount</td>
                      <td><?php echo html_escape(@$payment_info->amount)?></td>
                    </tr>
                  </tbody>
            </table>

          <div class="alert alert-success">
            <p class="text-success">Success! We have received your payment. Thanks for your payment via paypal</p>
          </div>
        </div>
		

		<div class="container inners">
        <div> Pay with paypal</div>
		</div> 

		</div>
		
	</body>
</html>