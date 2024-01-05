<?php
include("ketnoi.php");
include("header_admin.php");

$query = "SELECT gv.magv, gv.hotengv, COUNT(pcc.malichthi) AS soluong_gacthi
          FROM giangvien gv
          JOIN phancongcoithi pcc ON gv.magv = pcc.magv
          GROUP BY gv.magv, gv.hotengv
          ORDER BY soluong_gacthi DESC";

$result = mysqli_query($conn, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)){
  $data[] = $row;
}
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Giáo viên');
    data.addColumn('number', 'Số lần tham gia gác thi');

    <?php
    foreach($data as $row) {
      echo "data.addRow(['" . $row['hotengv'] . "', " . $row['soluong_gacthi'] . "]);";
    }
    ?>

    var options = {
      title: 'Thống kê giáo viên tham gia gác thi nhiều nhất',
      is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  }
</script>

<div id="piechart_3d" style="width: 1150px; height:600px;"></div>

<?php
include("footer_admin.php");
?>