<?php
session_start();

// Access control
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'SupplyChainManager') {
    header("Location: index.php?error=Unauthorized access");
    exit;
}

// Database connection
$host = "mydb.itap.purdue.edu";
$user = "kuo104";       // or your DB username
$pass = "Lunchbox987";           // add password if needed
$dbname = "kuo104";      // replace with your actual DB name

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Query all companies
$sql = "SELECT CompanyID, CompanyName FROM Company ORDER BY CompanyName ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Supply Chain Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 6px;
      padding: 60px 80px;
      text-align: center;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
    h2 {
      margin-bottom: 40px;
      font-weight: 500;
    }
    label {
      font-size: 18px;
      margin-right: 10px;
      color: #555;
    }
    select {
      font-size: 16px;
      padding: 8px 16px;
      border-radius: 6px;
      border: 1px solid #888;
      background-color: #fdfdfd;
      cursor: pointer;
    }
    select:hover {
      border-color: #666;
    }
    .logout {
      display: block;
      margin-top: 40px;
      text-decoration: none;
      color: #0d6efd;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Welcome!</h2>
    <form action="company_dashboard.php" method="GET">
      <label for="company">Select a company:</label>
      <select id="company" name="company_id" required>
        <option value="">Select one (dropdown)</option>
        <?php while ($row = $result->fetch_assoc()): ?>
          <option value="<?= $row['CompanyID'] ?>"><?= htmlspecialchars($row['CompanyName']) ?></option>
        <?php endwhile; ?>
      </select>
      <br><br>
      <button type="submit">Go</button>
    </form>
    <a href="logout.php" class="logout">Logout</a>
  </div>
</body>
</html>

<?php $conn->close(); ?>


