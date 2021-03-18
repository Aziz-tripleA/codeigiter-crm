<!-- ChartJs JavaScript -->
<script src="<?php echo base_url()?>assets/plugins/chartJs/Chart.min.js" type="text/javascript"></script>

<script type="text/javascript">
    //bar chart
    'use strict';
    var ctx = document.getElementById("barChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Last 30 days", "Last 15 days", "Last 7 days", "Today"],
            datasets: [
                {
                    label: "",
                    data: [<?php echo $last_30;?>, <?php echo $last_15;?>, <?php echo $last_7;?>, <?php echo count(@$to_day_get_appointment);?>],
                    borderColor: "#223F4A",
                    borderWidth: "0",
                    backgroundColor: "#223F4A"
                },
                {
                    label: "",
                    data: [<?php echo $last_30;?>, <?php echo $last_15;?>, <?php echo $last_7;?>, <?php echo count(@$to_day_get_appointment);?>],
                    borderColor: "#57787D",
                    borderWidth: "0",
                    backgroundColor: "#57787D"
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });

</script>