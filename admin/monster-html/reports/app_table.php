
<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['table']});
    google.charts.setOnLoadCallback(drawTable);

    function drawTable() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Counseller Name');
      data.addColumn('number', 'Pending');
      data.addColumn('number', 'Accepted');
      data.addColumn('number', 'Completed');

      // Replace the sample data with your actual data fetched from the database
      data.addRows([
        <?php
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










        // Assuming you have already established the database connection
        $sql = "SELECT d.name AS doctor_name,
                       SUM(CASE WHEN a.status = 'pending' THEN 1 ELSE 0 END) AS pending_count,
                       SUM(CASE WHEN a.status = 'accepted' THEN 1 ELSE 0 END) AS accepted_count,
                       SUM(CASE WHEN a.status = 'completed' THEN 1 ELSE 0 END) AS completed_count
                FROM doctor d
                LEFT JOIN appoinment a ON d.d_id = a.d_id
                GROUP BY d.d_id, d.name";

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "['" . $row['doctor_name'] . "', " . $row['pending_count'] . ", " . $row['accepted_count'] . ", " . $row['completed_count'] . "],";
          }
        }
        ?>
      ]);

      var table = new google.visualization.Table(document.getElementById('table_div'));

      table.draw(data, {showRowNumber: true, width: '80%', height: '13%'});
    }
  </script>
</head>
<body>
  <h2>Appointment count of each counseller</h2>
  <div id="table_div"></div>
</body>
</html>
