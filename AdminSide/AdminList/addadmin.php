<?php
// DB Connection
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "findmystufflog";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$successMsg = "";
$errorMsg = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $faculty_id = trim($_POST['faculty_id']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']); 
    $status = "active"; 

    if (!empty($name) && !empty($email) && !empty($username) && !empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO login (name, faculty_id, email, username, password, status, created_at)
                VALUES (?, ?, ?, ?, ?, ?, NOW())";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $faculty_id, $email, $username, $hashedPassword, $status);

        if ($stmt->execute()) {
            // Redirect back to admin list after success
            header("Location: adminlist.php?success=1");
            exit();
        } else {
            $errorMsg = "❌ Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        $errorMsg = "⚠️ Please fill in all required fields.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Navbar/navbar.css">
  <link rel="stylesheet" href="../AdminList/addadmin.css">
  <title>Add Admin</title>

  
</head>
<body>
  <div class="container">
    <?php include '../Navbar/navbar.php'; ?>

    <div class="content">
      <div class="main-wrapper">
        <div class="form-card">
          <h2>Add New Admin</h2>

          <?php if ($successMsg) echo "<p class='message success'>$successMsg</p>"; ?>
          <?php if ($errorMsg) echo "<p class='message error'>$errorMsg</p>"; ?>

          <form method="POST" action="">
            <div class="form-group">
              <label>Name:</label>
              <input type="text" name="name" required>
            </div>

            <div class="form-group">
              <label>Faculty ID:</label>
              <input type="text" name="faculty_id">
            </div>

            <div class="form-group">
              <label>Email:</label>
              <input type="email" name="email" required>
            </div>

            <div class="form-group">
              <label>Username:</label>
              <input type="text" name="username" required>
            </div>

            <div class="form-group">
              <label>Password:</label>
              <input type="password" name="password" required>
            </div>

            <div class="form-actions">
              <button type="submit" class="add-btn">Save Admin</button>
              <a href="adminlist.php" class="cancel-btn">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
