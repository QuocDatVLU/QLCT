<?php
	include 'header.php'
?>
<div class="chart-container">
	<canvas id="myChart"></canvas>
</div>
<?php
	include 'footer.php'
?>
<script type="text/javascript">
	$(document).ready(function() {
		alert('Chart');
	$.ajax({
		method: 'POST',
		dataType: 'json',
		url: 'getChart.php',
	}).done(function(data){
		if (data.result) {
			var categories = [];
			var soluong = [];
			$.each(data.chart, function (index,row) {
				categories.push(row.name);
				soluong.push(row.soluong);
			})
			var ctx = document.getElementById("myChart").getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'bar',
			    data: {
			        labels: categories,
			        datasets: [{
			            label: '# of products',
			            data: soluong,
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)'
			            ],
			            borderColor: [
			                'rgba(255,99,132,1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 5
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:true
			                }
			            }]
			        }
			    }
			});
		}else {
			console.log(data.message);
		}

	}).fail(function(jqXHR, statusText, errorThrown){
		console.log("Fail:"+ jqXHR.responseText);
		console.log(errorThrown);
	}).always(function(){

	})
})
</script>