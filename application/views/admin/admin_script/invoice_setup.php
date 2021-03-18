
<script type="text/javascript">

  'use strict'; 
$(document).ready(function() { 

    'use strict'; 
    var base_url = $("#base_url").val();
    // vat in parcent
    $('body').on('keyup change', '#vatParcent', function() {

        var total       = $('#fee').val(); 
        $('#vat').val(parseFloat((total * $(this).val()) / 100).toFixed(2)); 
        // vat in parcent
        var vat         = $('#vat').val();
        var discount    = $('#discount').val(); 

        $("#grand_total").val(((parseFloat(total)+parseFloat(vat))-(parseFloat(discount))).toFixed(2));

        // paid and due
        var grand_total = $('#grand_total').val();
        var paid        = $('#paid').val();
        $('#due').val((parseFloat(grand_total)-parseFloat(paid)).toFixed(2)); 
    });

    // discount in parcent
    $('body').on('keyup change', '#discountParcent', function() {
        var total      = $('#fee').val(); 
        $('#discount').val(parseFloat((total * $(this).val()) / 100).toFixed(2)); 

        // vat in parcent
        var vat         = $('#vat').val();
        var discount    = $('#discount').val(); 
        $("#grand_total").val(((parseFloat(total)+parseFloat(vat))-(parseFloat(discount))).toFixed(2));

        // paid and due
        var grand_total = $('#grand_total').val();
        var paid        = $('#paid').val();
        $('#due').val((parseFloat(grand_total)-parseFloat(paid)).toFixed(2));  
    });

    // paid and due
    $('body').on('keyup change', '.paidDue', function() {
        var grand_total = $('#grand_total').val();
        var paid        = $('#paid').val();
        $('#due').val((parseFloat(grand_total)-parseFloat(paid)).toFixed(2)); 
    }); 
 


    //#------------------------------------
    //   PATIENT INFORMATION
    //#------------------------------------

    $('body').on('keyup change', '#phone', function() {
        var phone = $(this).val();

        if(phone.length > 0)
        $.ajax({

            'url': '<?php echo base_url();?>' + 'admin/Ajax_controller/load_patient_info/'+phone,
            'type': 'GET',
            'dataType': 'JSON',
            'success': function(data){ 

                if (data.patient_id) { 
                    $('#patient_name').val(data.family_name);
                    $('#patient_address').val(data.address);
                    $('#patient_id').val(data.patient_id);
                    $(".invlid_patient_id").text(' Patient Pnone Number');
                } else {
                    $(".invlid_patient_id").text('Invalid Patient Phone Number');
                }
            }, error   : function() {
                alert('failed!');
            } 
           
        });
    });

});

 

/*-----------------------------------------------*/
/*   LOAD VAT/DISCOUNT PERCENT AUTOMATICALLY     */
/*-----------------------------------------------*/
  'use strict'; 
$(window).on('load', function() {
    'use strict'; 
    var total       = $('#total').val();
    var vat         = $('#vat').val();
    var discount    = $('#discount').val(); 
    $("#grand_total").val(((parseFloat(total)+parseFloat(vat))-(parseFloat(discount))).toFixed(2)); 
});
</script>