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
        $timezone = $this->db->select('*')
            ->from('web_pages_tbl')
            ->where('name','timezone')
            ->get()
            ->row();           
    date_default_timezone_set(@$timezone->details);
?>


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
        <!-- style -->
        <link href="<?php echo base_url(); ?>assets/public_css/appointment_style.css" rel="stylesheet">
        <!-- coustome style -->
        <link href="<?php echo base_url();?>assets/dist/css/coustom_css.css" rel="stylesheet">
 
    </head>

<body>


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



    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/plugins/jQuery/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/print_preview.js" type="text/javascript"></script>



    </body>
</html>