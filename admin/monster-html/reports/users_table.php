
<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['table']});
    google.charts.setOnLoadCallback(drawTable);

    function drawTable() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'User ID');
      data.addColumn('string', 'Username');
      data.addColumn('number', 'Age');
      data.addColumn('string', 'Gender');
      data.addColumn('string', 'District');

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
          $sql = "SELECT u.u_id AS user_id,
                         u.name AS username,
                         u.age,
                         u.gender,
                         c.name AS district
                  FROM user u
                  LEFT JOIN city c ON u.city_id = c.city_id";

          $result = $conn->query($sql);

          if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "['" . $row['user_id'] . "', '" . $row['username'] . "', " . $row['age'] . ", '" . $row['gender'] . "', '" . $row['district'] . "'],";
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
  <div id="table_div"></div>
</body>
</html>
