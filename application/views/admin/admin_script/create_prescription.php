
 <script type="text/javascript">

    // load  
    function loadeSection(){

    'use strict';  
       var lang_id = $('#lang_id').val();
        if (lang_id!='') {
            $.ajax({ 
                'url': '<?php echo base_url();?>' + 'admin/Ajax_controller/lang_section/'+lang_id,
                'type': 'GET', 
                'data': {'lang_id': lang_id },
                'success': function(data) { 
                    
                    var container = $(".section");
                    if(data==0){
                        container.html("There is no lang_id");
                    }else{ 
                        container.html(data);
                     
                    }
                }
            });
        };
    }


    // load  
    function loadeDisease(){ 
    'use strict'; 
       var disease = $('#disease').val();
        if (disease!='') {
            $.ajax({ 
                'url': '<?php echo base_url();?>' + 'admin/Ajax_controller/load_disease/'+disease,
                'type': 'GET', //the way you want to send data to your URL
                'data': {'disease': disease },
                'success': function(data) { 
                    
                    var container = $(".disease");
                    if(data==0){
                        container.html("There is no disease");
                    }else{ 
                        container.html(data);
                     
                    }
                }
            });
        };
    }


    // load  
    function loadeCategory(){
        'use strict';
      
       var category = $('#speed2').val();

        if (category!='') {
            $.ajax({ 
                'url': '<?php echo base_url();?>' + 'admin/Ajax_controller/load_category/'+category,
                'type': 'GET', //the way you want to send data to your URL
                'data': {'category': category },
                'success': function(data) { 
                    
                    var container = $(".category");
                    if(data==0){
                        container.html("There is no category");
                    }else{ 
                        container.html(data);
                     
                    }
                }
            });
        };
    }


    // load  
    function loadeClasi(){  
        'use strict';
       var classific = $('#speed3').val();
       
        if (classific!='') {
            $.ajax({ 
                'url': '<?php echo base_url();?>' + 'admin/Ajax_controller/load_classification/'+classific,
                'type': 'GET', //the way you want to send data to your URL
                'data': {'classific': classific },
                'success': function(data) { 
                    
                    var container = $(".classific");
                    if(data==0){
                        container.html("There is no classific");
                    } else { 
                        container.html(data);
                     
                    }
                }
            });
        };
    }


    // load medicine name
    function loadMedicine(){ 

    'use strict'; 
       var classi_id = $('#classific').val();
        if (classi_id!='') {
            $.ajax({ 
                'url': '<?php echo base_url();?>' + 'admin/Ajax_controller/load_madicine/'+classi_id,
                'type': 'GET', //the way you want to send data to your URL
                'data': {'classi_id': classi_id },
                'success': function(data) { 

                    var container = $(".medicine_area");
                    if(data==0){
                        container.html("<div class='alert alert-danger'>There Is No Medicine</div>");
                    }else{ 
                        container.html(data);
                    }
                }
            });
        };
    }

    // load patient name
    function loadHarbs(medicine_id){  

        'use strict';

        if (medicine_id!='') {
            $.ajax({ 
                'url': '<?php echo base_url();?>' + 'admin/Ajax_controller/load_madicine_harbs/'+medicine_id,
                'type': 'GET', //the way you want to send data to your URL
                'data': {'medicine_id': medicine_id },
                'success': function(data) { 
                    var container = $("#two tbody");
                    if(data==0){
                        container.html("<?php echo display('patient_name_load_msg')?>");
                    }else{ 
                        container.append(data);
                    }
                }
            });
        };
    }


    
    $(document).ready(function () {
        'use strict';
        // add row
        var maxField = 50; 
        var addButton = $('.addMedicine'); 
        var wrapper = $('.field_wrapper');
       
        var x = 1; 
        var counter = 2;

        $(addButton).on('click',function(){ 

            if(x < maxField){ 
                var fieldHTML = '<tr>'+
                        '<th scope="row">'+
                            '<input class="form-control sajetion" id="92" name="medicine[]" autocomplete="off" placeholder="Enter Medicine" type="text">'+
                            '<div id="suggesstion-box"></div>'+
                        '</th>'+
                        '<td><input type="text"  class="form-control" name="harbs[]" id="tokenfield-typeahead'+x+'" value="" placeholder="Enter Medicine Herbs" /></td>'+
                        '<td><input type="text"  class="form-control" name="comment[]" id="tokenfield-typeahead'+x+'" value="" placeholder="Comment" /></td>'+
                        '<td>'+
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm remove_button" type="button">Delete</a>'+
                        '</td>'+
                    '</tr>';  
                x++; 
                $(wrapper).append(fieldHTML); 
            }
        });


        $('table').on('keyup',".sajetion",function(){  
            var output = $(this).next(); 

            var classific = document.getElementById('classific').value;
            var csrf_test_name = $("[name=csrf_test_name]").val();

            $.ajax({
            type: "POST",
            url: '<?php echo base_url();?>' + 'admin/Ajax_controller/medicine_harbs_saj/',
            data: {classific: classific,keyword:$(this).val(),csrf_test_name:csrf_test_name}, 
                success: function(data){ 
                    
                    $(output).html(data); 
                }
            });
        });

        $('body').on('click','.country-list > li',function(){
            var medicine_id = $(this).val();
            var target = $(this).parent().parent().parent().next().children();

            $.ajax({
            type: "GET",
            url: '<?php echo base_url();?>' + 'admin/Ajax_controller/herbs_get/',
            data:'keyword='+$(this).val(),
                success: function(data){ 
                    target.val(data);
                }
            });


            var medicine = $(this).text();
            var target_val = $(this).parent().parent().prev().prev(); 
            var target_text = $(this).parent().parent().prev(); 
           
            $(target_val).val(medicine); //value passing
            $(target_text).val(medicine); //value passing

            $(this).parent().slideUp(300); 
        });

        // remove row    
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            var row = $(this).parent('td').parent('tr');
            $(row).remove();
            x--; 
        });  


        var engine = new Bloodhound({

            local: [{value: 'red'}, {value: 'blue'}, {value: 'green'}, {value: 'yellow'}, {value: 'violet'}, {value: 'brown'}, {value: 'purple'}, {value: 'black'}, {value: 'white'}],
            datumTokenizer: function (d) {
                return Bloodhound.tokenizers.whitespace(d.value);
            },
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });

        engine.initialize();

        $('#tokenfield-typeahead1').tokenfield({
            typeahead: [null, {source: engine.ttAdapter()}]
        });

        $('#tokenfield-typeahead2').tokenfield({
            typeahead: [null, {source: engine.ttAdapter()}]
        });

        $('#tokenfield-typeahead3').tokenfield({
            typeahead: [null, {source: engine.ttAdapter()}]
        });

        $('#tokenfield-typeahead4').tokenfield({
            typeahead: [null, {source: engine.ttAdapter()}]
        });

    
    });


</script>