<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo (!empty($info->website_title->details)?$info->website_title->details:null); ?></title>
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
              <a href="<?php echo base_url();?>"><img src="<?php echo (!empty($info->logo->picture)?$info->logo->picture:null); ?>" ></a>
        </div>
      </div>

		
				<div class="container">
          <p>Sorry!</p>
          <p>We did not recive your payment. It's may be error or thre is not enough money of your account.</p>
        </div>
		

			<div class="container inners">
			

        <div>
         Pay with paypal
              <a target="_blank" href="<?php echo base_url();?>">
              <img src="<?php echo base_url()?>assets/images/paypal.png" class="img-responsive"  alt=""></a>
        </div>
			</div> 
		</div>
		
	</body>
</html>