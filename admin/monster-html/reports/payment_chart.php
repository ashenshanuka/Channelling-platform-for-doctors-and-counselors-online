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
$result = $conn->query("SELECT MONTH(book_date) AS month, SUM(amount) AS income FROM appoinment GROUP BY MONTH(book_date)");
$data = array(array('Month', 'Income'));

while ($row = $result->fetch_assoc()) {
    $month = (int)$row['month'];
    $income = (int)$row['income'];
    $monthName = date('F', mktime(0, 0, 0, $month, 1)); // Get the full month name (e.g., January)
    $data[] = array($monthName, $income);
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
        title: 'Income Generated by Month',
        hAxis: {
          title: 'Month',
        },
        vAxis: {
          title: 'Income (LKR)', // Add the currency symbol manually here
          format: 'decimal', // Formats the y-axis values as decimals
          ticks: [0, 500, 1000, 1500, 2000, 2500] // Add your desired tick values here
        },
        chartArea: {width: '60%', height: '70%'},
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















<!-- 



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
        title: 'Income Generated by Month',
        hAxis: {
          title: 'Month',
        },
        vAxis: {
          title: 'Income',
          format: 'currency', // Formats the y-axis values as currency
          currencySymbol: 'LKR' // Set the currency symbol to 'LKR'
        },
        chartArea: {width: '60%', height: '70%'},
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
</html> -->