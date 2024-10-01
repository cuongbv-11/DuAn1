<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ PHP</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="row2">
        <div class="row2 font_title">
            <h1>Thống Kê Sản Phẩm</h1>
        </div>
        <div class="row2 form_content ">
            <div class="row2 mb10 formds_loai">
                <canvas id="myChart" width="400px" height="500px"></canvas>
                <script>
                    var labels = [];
                    var dataValues = [];
                    <?php foreach ($listthongke as $thongke) : ?>
                        labels.push("<?php echo $thongke['tendm']; ?>");
                        dataValues.push(<?php echo $thongke['countsp']; ?>);
                    <?php endforeach; ?>
                    var data = {
                        labels: labels,
                        datasets: [{
                            label: "Số lượng sản phẩm",
                            backgroundColor: ["red", "green", "blue", "orange", "brown"],
                            data: dataValues
                        }]
                    };
                    // Lấy thẻ canvas và vẽ biểu đồ
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'pie', // Change the chart type to 'pie'
                        data: data,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false
                        }
                    });
                </script>
            </div>
        </div>
</body>
