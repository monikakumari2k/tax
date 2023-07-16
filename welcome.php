<?php

$host = 'localhost';
$db = 'tax_regime';
$user = 'root';
$password = '';


$mysqli = new mysqli($host, $user, $password, $db);
session_start();
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    $_SESSION['userPNO'] = $row['PNO'];
    $_SESSION['userlevel'] = $row['level'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
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
            <h1 id="heading_content">Tax Regime Switch option facility from default(New Tax Regime) to Old Tax Regime for Financial year 2023-24</h1>
        </div>

        <h6 id="abc">Recorded details</h6>
        <div class="border">
        <form action="thanks.php" method="post">
            <div class="first">
            <label for="pno"><span>PNO:</span>
            <input type="text" id="pno" name="pno" value="<?php echo $_SESSION['userPNO'] ;?>" readonly></label><br><br>
    
            <label for="name"><span>Name:</span>
            <input type="text" id="name" name="name" value="<?php echo $_SESSION['username'] ;?>" readonly></label><br><br>
    
            <label for="level"><span>Level:</span>
            <input type="text" id="level" name="level" value="<?php echo $_SESSION['userlevel'] ;?>" readonly></label><br><br>
        </div>
        <div id="cont">
            <h6 style="margin:2px">Documents:</h6>
        <div class="button-column">
         <button id="btn-2" type="button" onclick="window.location.href='tax.xls'"style="color:white">CBDT clarification for TDS</button>
         <button id="btn-2" type="button" onclick="window.location.href='abc.pdf'"style="color:white">New Tax Slab vs Old Tax slab</button>
            <button id="btn-2" type="button" onclick="window.location.href='calc.docx'"style="color:white">Tax calculator</button>
        </div><br>
</div>

    <h6><b>you are currently under income Tax default Option-1(New Tax Regime):</h6>
    <br/>
    <h6>Do you want to switch from Option-1(New Tax Regime) to Option-2(Old Tax Regime)?
    <select>
        <option value="yes">yes</option>
        <option value="no">no</option>
    </select>
    </h6><br>
    <input type="checkbox"> I have read the enclosed documents attached carefully before exercising the switching option.<br/>
    <input type="checkbox"> I can switch only once in a financial year.<br/>
    

       
  
        </div>
        <div class="footer">
        <button class="btn">
            <input type="submit" value="submit">
           
        </button>
        </div>
</form>
<script src="script.js"></script>
</body>
</html>