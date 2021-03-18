<!DOCTYPE html>
    <html lang="en">
    <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title> Prescription </title>
            <!-- Bootstrap -->
            <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <!-- flaticon -->
            <link href="<?php echo base_url(); ?>assets/public_css/flaticon.css" rel="stylesheet">
            <!-- font-awesome -->
            <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
            
           
            <?php require 'style-default.php';?>
            <?php require 'style-1.php';?>
            <?php require 'style-2.php';?>

    </head>

    <body>
        <div class="container">
            <div id="default">
                <?php echo htmlspecialchars_decode(@$default);?>
            </div>

            <div id="others">
                <?php if(@$others!=NULL){
                    echo htmlspecialchars_decode(@$others);
                    }else{
                        echo "<div class='alert alert-danger'>There have no setup print pattern.</div>";
                    }
                ?>
            </div>
        </div>


    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/plugins/jQuery/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/print_preview.js" type="text/javascript"></script>

     </body>
</html>

