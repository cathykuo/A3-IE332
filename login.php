<?php
// No spaces or lines before this opening tag!

session_start();

// 1. Database connection (same as your working db_test.php)
$host = "mydb.itap.purdue.edu";
$user = "kuo104";
$pass = "Lunchbox987";
$dbname = "kuo104";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Must come from the login form via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

if ($username === '' || $password === '') {
    header("Location: index.php?error=" . urlencode("Please enter username and password."));
    exit;
}

// 3. Look up the user (NO get_result, just like lab3)
$u_escaped = $conn->real_escape_string($username);
$sql = "SELECT Username, Password, Role FROM `User` WHERE Username = '$u_escaped'";
$result = $conn->query($sql);

if (!$result) {
    // If this prints, likely the User table doesn't exist or is named differently
    die("Query failed: " . $conn->error);
}

if ($row = $result->fetch_assoc()) {

    // Compare plain text for now (must match what's in your User table)
    if ($password === $row['Password']) {
        $_SESSION['username'] = $row['Username'];
        $_SESSION['role'] = $row['Role'];

        if ($row['Role'] === 'SupplyChainManager') {
            header("Location: supply_chain.php");
            exit;
        } elseif ($row['Role'] === 'SeniorManager') {
            header("Location: senior_manager.php");
            exit;
        } else {
            // Unexpected role value - show it so it doesn't 500
            die("Unknown role: " . htmlspecialchars($row['Role']));
        }
    }
}

// 4. If no row or wrong password
header("Location: index.php?error=" . urlencode("Invalid username or password."));
exit;