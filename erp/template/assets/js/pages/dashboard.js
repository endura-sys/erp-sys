// dashboard.js
var chartProductTotalSale;
var date;

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
			data: []
		}],
		colors: '#435ebe',
		xaxis: {
			categories: [],
		},
	}
	chartProductTotalSale = new ApexCharts(document.querySelector("#chart-product-day-sale"), optionsProductTotalDaySale);
	chartProductTotalSale.render();


	date = $('#today-date').val();

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

// ==================================================================================

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
				data: [0]
			}])
			chartProductTotalSale.updateOptions({
				xaxis: {
					categories: [0],
				},
			})


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

// ==================================================================================
// ==================================================================================
// ==================================================================================

// ui-apex chart
var area;
function renderYearGrossProfit() {
	var areaOptions = {
		series: [{
				name: "Gross Profit",
				data: [12],
			},
			{
				name: "series2",
				data: [23],
			},
		],
		chart: {
			height: 350,
			type: "area",
		},
		dataLabels: {
			enabled: false,
		},
		stroke: {
			curve: "smooth",
		},
		xaxis: {
			type: "date",
			categories: [
				"Jan",
				"Feb",
				"Mar",
				"Apr",
				"May",
				"Jun",
				"Jul",
				"Aug",
				"Sep",
				"Oct",
				"Nov",
				"Dec",
			],
		},
		// tooltip: {
		//   x: {
		//     format: "dd/MM/yy HH:mm",
		//   },
		// },
	};

	area = new ApexCharts(document.querySelector("#area"), areaOptions);
	area.render();
	date = $('#today-date').val();

	$.ajax({
		url: 'getPeriodGraphData',
		method: 'POST',
		data: {
			todayDate: date,
		},
		success: function (response) {
			// console.log(response);
			var result = JSON.parse(JSON.stringify(response));
			for (var i = 0, emp; i < result.length; i++) {
				emp = result[i];
			}
			console.log(typeof(emp));
			// console.log(typeof(emp["yearGrossProfit"]));
			area.updateSeries([{
				name: 'sales',
				data: emp["yearGrossProfit"]
			}])
		}
	});
}