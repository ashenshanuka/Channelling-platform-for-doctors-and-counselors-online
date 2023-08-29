 
 
<?php
// Replace these credentials with your actual database credentials
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



 

// Assuming the 'user' and 'doctor' tables have 'status' column as 1 for approved entries
$sql_user_count = "SELECT COUNT(u_id) as user_count FROM user";
$sql_doctor_count = "SELECT COUNT(d_id) as doctor_count FROM doctor WHERE status = 'approved'";

$result_user_count = $conn->query($sql_user_count);
$result_doctor_count = $conn->query($sql_doctor_count);

$user_count = 0;
$doctor_count = 0;

if ($result_user_count && $result_user_count->num_rows > 0) {
    $row = $result_user_count->fetch_assoc();
    $user_count = $row['user_count'];
}

if ($result_doctor_count && $result_doctor_count->num_rows > 0) {
    $row = $result_doctor_count->fetch_assoc();
    $doctor_count = $row['doctor_count'];
}

// Close the database connection
$conn->close();
?>



<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Count'],
          [' Users', <?php echo $user_count; ?>],
          ['Approved Counsellers', <?php echo $doctor_count; ?>]
        ]);

        var options = {
          title: ' Users and Counsellers Count Comparison'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
