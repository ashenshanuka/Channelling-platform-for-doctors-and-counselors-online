<?php
// Assuming you have already established the database connection as shown in the previous example
$host = "localhost";
$username = "root";
$password = "";
$database = "hospital";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// SQL query to fetch the appointment count for each status and month
$sql = "SELECT
            MONTH(book_date) as month,
            SUM(CASE WHEN status = 'accepted' THEN 1 ELSE 0 END) as accepted_count,
            SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending_count,
            SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed_count
        FROM
            appoinment
        GROUP BY
            MONTH(book_date)";

$result = $conn->query($sql);

// Create an associative array to hold the data for Google Charts
$data = array();
$data[] = ['Month', 'Accepted', 'Pending', 'Completed'];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $month = date("F", mktime(0, 0, 0, $row['month'], 1));
        $accepted = (int)$row['accepted_count'];
        $pending = (int)$row['pending_count'];
        $completed = (int)$row['completed_count'];
        $data[] = [$month, $accepted, $pending, $completed];
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);

      var options = {
        title: 'Appointment Count by Month',
        hAxis: {title: 'Month',
          ticks: [
            <?php
              // Get the current month and add three more months to it
              $currentMonth = date('n');
              for ($i = 0; $i < 3; $i++) {
                $month = ($currentMonth + $i) % 12;
                if ($month === 0) $month = 12; // Fix for December (12 % 12 = 0)
                echo "{v: " . $month . ", f: '" . date('M', mktime(0, 0, 0, $month, 1)) . "'}, ";
              }
            ?>
          ]},
        vAxis: {title: 'Appointment Count',format:'0'},
        chartArea: {width: '40%', height: '70%'},
        bars: 'group' 
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
      chart.draw(data, options);
    }
  </script>
</head>
<body>
  <div id="columnchart" style="width: 900px; height: 500px;"></div>
</body>
</html>
