<!DOCTYPE html>
<script>

    

    $("#today-date").on('change', function () {
        renderProductTotalDaySaleOnchange();
        // date = $('#today-date').val();
        // var alipaySale = $('#alipaySale').val();

        // $.ajax({
        //     url: 'getTodaySale',
        //     method: 'POST',
        //     data: {
        //         todayDate: date,
        //     },
        //     success: function (response) {

        //         var result = JSON.parse(response);
        //         for (var i = 0, emp; i < result.length; i++) {
        //             emp = result[i];
        //         }
        //         document.getElementById("alipaySale").innerHTML = emp["alipay"] + "";
        //         document.getElementById("fpsSale").innerHTML = emp["fps"] + "";
        //         document.getElementById("cashSale").innerHTML = emp["cash"] + "";
        //         document.getElementById("totalSale").innerHTML = emp["total"] + "";
        //     }
        // });

        // $.ajax({
        //     url: 'test111',
        //     method: 'POST',
        //     data: {
        //         todayDate: date,
        //     },
        //     success: function (response) {
        //         var result = JSON.parse(JSON.stringify(response));
        //         for (var i = 0, emp; i < result.length; i++) {
        //             emp = result[i];
        //         }
        //         chartProductTotalSale.updateSeries([{
        //             name: 'sales',
        //             data: emp["product_quantity"]
        //         }])
        //         chartProductTotalSale.updateOptions({
        //             xaxis: {
        //                 categories: emp["product_name"],
        //             },
        //         })
        //         // var chartProductTotalSale = new ApexCharts(document.querySelector("#chart-product-day-sale"), optionsProductTotalDaySale);
        //         // chartProductTotalSale.render();
        //     }
        // });
    });
    </script>
</html>
