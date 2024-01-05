<?php
include("ketnoi.php");
include("header_admin.php");

// Mặc định là năm hiện tại
$current_year = date('Y');

// Nếu người dùng chọn năm từ form, sử dụng năm đó
if(isset($_GET['year'])) {
  $selected_year = $_GET['year'];
} else {
  $selected_year = $current_year;
}

// Truy vấn SQL để lấy danh sách các năm có trong cơ sở dữ liệu
$query_years = "SELECT DISTINCT YEAR(ngaythi) AS nam FROM lichthi";
$result_years = mysqli_query($conn, $query_years);

// Lưu các năm vào mảng để hiển thị trong form
$year_options = '';
while ($row_year = mysqli_fetch_assoc($result_years)) {
  $selected = ($selected_year == $row_year['nam']) ? 'selected' : '';
  $year_options .= "<option value='" . $row_year['nam'] . "' $selected>" . $row_year['nam'] . "</option>";
}

// Truy vấn SQL để lấy số lượng lịch thi của mỗi tháng trong năm đã chọn
$query = "SELECT MONTH(ngaythi) as thang, COUNT(*) as soluonglichthi
          FROM lichthi
          WHERE YEAR(ngaythi) = $selected_year
          GROUP BY thang";

$result = mysqli_query($conn, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)){
  $data[] = $row;
}

// Đóng kết nối
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Thống kê số lượng lịch thi</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <style>
    .loc-nam {
        display: flex;
        align-items: center;
        padding: 10px 25px;
        gap: 5px;
    }

    .loc-nam select,input {
        padding: 0px 5px;
        height: 30px;
    }
    </style>
</head>

<body>

    <!-- Form cho phép chọn năm -->
    <form method="GET" action="">
        <div class="loc-nam">
            <label for="year">Chọn năm:</label>
            <select name="year" id="year">
                <?php echo $year_options; ?>
            </select>
            <input type="submit" value="Xem">
        </div>

    </form>

    <div id="columnchart1" style="width: 1150px; height: 550px;"></div>

    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tháng');
        data.addColumn('number', 'Số lượng lịch thi');

        <?php
    foreach($data as $row) {
      echo "data.addRow(['Tháng ".$row['thang']."', ".$row['soluonglichthi']."]);";
    }
    ?>

        var options = {
            title: 'Thống kê số lượng lịch thi theo tháng năm <?php echo $selected_year; ?>',
            hAxis: {
                title: 'Tháng'
            },
            vAxis: {
                title: 'Số lượng lịch thi'
            },
            bars: 'vertical',
            colors: ['BE3144']
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('columnchart1'));
        chart.draw(data, options);
    }
    </script>

</body>

</html>

<?php
include("footer_admin.php");
?>