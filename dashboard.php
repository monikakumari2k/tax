<!DOCTYPE html>
<html>
<head>
  <title>dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
  <style>
    table {
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid black;
      padding: 5px;
    }
  </style>
</head>
<body>
<header class="sticky-header">
    <div class="nav">
    <div id="head">  
         <h1>Tax Regime</h1></div>
    </div>
    <div class="user-options">
    <a href="dashboard.php">Dashboard</a>
    <a href="logout.php">Logout</a>
    </div>
</div>
  
    </header>
    <div id="heading">
            <h1 id="heading_content">Report</h1>
        </div>
        <h5 id="search">search</h5>
<div class="box">
        

        <form action="" method="post">
            <div id="contain">
            <label for="startDate">From Date:</label>
            <input type="date" id="startDate" name="startDate" required>
            
            <label for="endDate">To Date:</label>
            <input type="date" id="endDate" name="endDate" required>
            
            <button id="bttn" type="submit" name="fetchData">view</button>
            </div>
        </form>
</div>

  <div id="resultContainer">
    <h5 id="report">REPORT</h5>
    <?php
    // Check if the form is submitted
    if (isset($_POST['fetchData'])) {
      $startDate = $_POST['startDate'];
      $endDate = $_POST['endDate'];

      // Connect to the database (replace with your database credentials)
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "tax_regime";

      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Construct the SQL query
      $sql = "SELECT PNO,username,level,date FROM users WHERE date BETWEEN '$startDate' AND '$endDate'";

      // Execute the query
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Generate the table HTML
        

        echo '<table><tr><th>PNO</th><th>Name</th><th>level</th><th>Registration Date</th></tr>';
        while ($row = $result->fetch_assoc()) {
          echo '<tr><td>' . $row['PNO'] . '</td><td>' . $row['username'] . '</td><td>' .$row['level'] . '</td><td>'. $row['date'] . '</td></tr>';
        }
        echo '</table>';
      } else {
        echo "No results found.";
      }

      // Close the database connection
      $conn->close();
    }
    ?>
  </div>
</body>
</html>
