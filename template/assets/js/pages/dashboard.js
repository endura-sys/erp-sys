var chartProductTotalSale;

function renderProductTotalDaySale() {

	var optionsProductTotalDaySale = {
		annotations: {
			position: 'back'
		},
		dataLabels: {
			enabled: false
		},
		chart: {
			type: 'bar',
			height: 300
		},
		fill: {
			opacity: 1
		},
		plotOptions: {

		},
		series: [{
			name: 'sales',
			data: [0, 0, 0, 0, 0]
		}],
		colors: '#435ebe',
		xaxis: {
			categories: ["1", "2", "3", "4", "5"],
		},
	}
	// console.log(productSale);
	chartProductTotalSale = new ApexCharts(document.querySelector("#chart-product-day-sale"), optionsProductTotalDaySale);
	chartProductTotalSale.render();


	var date = $('#today-date').val();

	$.ajax({
		url: 'getTodaySale',
		method: 'POST',
		data: {
			todayDate: date,
		},
		success: function (response) {

			// alert(response);

			var result = JSON.parse(response);
			for (var i = 0, emp; i < result.length; i++) {
				emp = result[i];
				// console.log(emp);
			}
			document.getElementById("alipaySale").innerHTML = emp["alipay"] + "";
			document.getElementById("fpsSale").innerHTML = emp["fps"] + "";
			document.getElementById("cashSale").innerHTML = emp["cash"] + "";
			document.getElementById("totalSale").innerHTML = emp["total"] + "";
		}
	});

	$.ajax({
		url: 'test111',
		method: 'POST',
		data: {
			todayDate: date,
		},
		success: function (response) {
			var result = JSON.parse(JSON.stringify(response));
			for (var i = 0, emp; i < result.length; i++) {
				emp = result[i];
			}
			chartProductTotalSale.updateSeries([{
				name: 'sales',
				data: emp["product_quantity"]
			}])
			chartProductTotalSale.updateOptions({
				xaxis: {
					categories: emp["product_name"],
				},
			})
		}
	});

}


function renderProductTotalDaySaleOnchange() {
	date = $('#today-date').val();
	var alipaySale = $('#alipaySale').val();

	$.ajax({
		url: 'getTodaySale',
		method: 'POST',
		data: {
			todayDate: date,
		},
		success: function (response) {

			var result = JSON.parse(response);
			for (var i = 0, emp; i < result.length; i++) {
				emp = result[i];
			}
			document.getElementById("alipaySale").innerHTML = emp["alipay"] + "";
			document.getElementById("fpsSale").innerHTML = emp["fps"] + "";
			document.getElementById("cashSale").innerHTML = emp["cash"] + "";
			document.getElementById("totalSale").innerHTML = emp["total"] + "";
		}
	});

	$.ajax({
		url: 'test111',
		method: 'POST',
		data: {
			todayDate: date,
		},
		success: function (response) {
			var result = JSON.parse(JSON.stringify(response));
			for (var i = 0, emp; i < result.length; i++) {
				emp = result[i];
			}
			chartProductTotalSale.updateSeries([{
				name: 'sales',
				data: emp["product_quantity"]
			}])
			chartProductTotalSale.updateOptions({
				xaxis: {
					categories: emp["product_name"],
				},
			})
		}
	});

}