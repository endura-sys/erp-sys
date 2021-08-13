<html>

<head>
    <script src="../template/assets/vendors/jquery/jquery.min.js"></script>
    <script src="../template/assets/js/moment.js"></script>
    <link rel="stylesheet" href="../template/assets/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="../template/assets/css/bootstrap-datetimepicker.min.css">
    <script src="../template/general/getData/globalData.js"></script>
</head>

<button id="test">testestset</button>

<script>
    $("#test").click(function() {
        var button = document.createElement('button');
        var input = document.createElement('input');
        button.innerHTML = 'click me';
        
        button.onclick = function() {
            alert(this.id);
            return false;
        };

        document.body.appendChild(input);
        document.body.appendChild(button);
    });

    var foo = function() {

    };
</script>

</html>