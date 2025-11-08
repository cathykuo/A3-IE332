<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'SeniorManager') {
  header("Location: index.php?error=Unauthorized");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Senior Manager Dashboard</title></head>
<body>
<h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
<p>You are logged in as Senior Manager.</p>
<a href="logout.php">Logout</a>
</body>
</html>

