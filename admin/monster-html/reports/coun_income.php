<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['table']});
    google.charts.setOnLoadCallback(drawTable);

    function drawTable() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Counselor ID');
      data.addColumn('string', 'Counselor Name');
      data.addColumn('number', 'Total Revenue');

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
$sql = "SELECT d.d_id AS counselor_id,
               d.name AS counselor_name,
               SUM(a.amount) AS total_amount
        FROM doctor d
        LEFT JOIN appoinment a ON d.d_id = a.d_id
        GROUP BY d.d_id, d.name
        ORDER BY total_amount DESC"; // Order by total_amount in descending order

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "[" . $row['counselor_id'] . ", '" . $row['counselor_name'] . "', " . $row['total_amount'] . "],";
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
<h2>Income of each counseller</h2>
  <div id="table_div"></div>
</body>
</html>
