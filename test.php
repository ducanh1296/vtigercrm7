<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="layouts/v7/lib/chartist-js-develop/dist/chartist.min.css">
    <script type="text/javascript" src="layouts/v7/lib/chartist-js-develop/dist/chartist.min.js"></script>
</head>
<body>
    <div class="ct-chart ct-square"></div>
</body>
<script>
    var data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        series: [
            [22, 28, 30, 33, 35, 38, 37, 36, 34, 29, 24, 24]
        ]
    };

    var options = {
        axisY: {
            onlyInteger: true
        },
        seriesBarDistance: 1000
    };

    new Chartist.Line('.ct-chart', data, options);
</script>
</html>