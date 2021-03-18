    $(document).ready(function() {  
        'use strict';

        var base_url = $("#base_url").val();
        
        $('.add-invoice').prop('disabled', true);

        $('body').on('keyup change', '#phone', function() {
            var phone = $(this).val();
            if(phone.length > 0)
            $.ajax({

                'url': base_url + 'admin/Ajax_controller/load_patient_info/'+phone,
                'type': 'GET',
                'dataType': 'JSON',
                'success': function(data){ 

                    if (data.patient_id) {

                        $('#patient_name').val(data.family_name);
                        $('#address').val(data.address);
                        $('#patient_id').val(data.patient_id);
                        $('#csc').removeClass('text-danger');
                        $(".invlid_patient_id").text(' Patient Pnone Number is Valid').addClass("text-success");
                       
                    } else {
                        $('#csc').removeClass('text-success');
                        $(".invlid_patient_id").text('Invalid Patient Phone Number').addClass("text-danger");
                    }
                }, error   : function() {
                    alert('failed!');
                } 
               
            });
        });


            var base_url = $("#base_url").val();
            $("#old").keyup(function(){
                var age = (this.value);
                if(age !==''){
                    $.ajax({
                        'url': base_url+ 'admin/Ajax_controller/age_to_birthdate/'+age.trim(),
                        'type': 'GET', 
                        'data': {'age': age },
                        'success': function(data) { 
                            var container = $(".birth_date");
                            if(data==0){
                                container.val("0000-00-00");
                            }else{ 
                                container.val(data); 
                            }
                        }
                    });
                }
            });


    });