        //print a div
        function printContent(el){
            'use strict';
            var restorepage  = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
            location.reload();
        }


        'use strict';
        $(document).ready(function(){

            $('#others').hide();
            $('#pad_p').hide();

            $("#pad").on('click',function(){
                $('#div1').hide();
                $('#dif_p').hide();
                $('#others').show();
                $('#pad_p').show();
            });

            $("#dif").on('click',function(){
                $('#div1').show();
                $('#dif_p').show();
                $('#others').hide();
                $('#pad_p').hide();
            });
        });