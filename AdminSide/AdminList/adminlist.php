<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Navbar/navbar.css">
  <link rel="stylesheet" href="../AdminList/admin.css">
  <title>Admin List</title>
 
</head>
<body>
  <div class="container">
    <?php include '../Navbar/navbar.php'; ?>

    <div class="content">
      <div class="main-wrapper">
        <!-- ✅ Topbar with Search + Icons + Greeting -->
        <div class="topbar">
          <h1>Admin Management</h1>
      
          <div class="right">
            
              
              <div class="theme-toggler">
                <span class="material-symbols-outlined active">wb_sunny</span>
                <span class="material-symbols-outlined">dark_mode</span>
              </div>
              <div class="profile">
                <div class="info">
                  <p>Hey, <b>Adrian</b></p>
                  <small class="text-muted">Admin</small>
                </div>
                <div class="profile-photo">
                  <img src="../Images/avatar.svg">
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        // DB connect
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "findmystufflog";

        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: ".$conn->connect_error);
        }

        $table = "login";
        $sql = "SELECT admin_id, name, faculty_id, email, username, COALESCE(status,'inactive') AS status, created_at FROM $table ORDER BY admin_id ASC";
        $result = $conn->query($sql);

        echo "<div class='header'>";
        echo "<h2>Admin List</h2>";
        echo "<button class='add-btn' onclick=\"window.location.href='addadmin.php'\"> Add Admin</button>";
        echo "</div>";

        if ($result && $result->num_rows > 0) {
          echo "<table>";
          echo "<tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Faculty ID</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Actions</th>
                </tr>";

          while ($row = $result->fetch_assoc()) {
            $statusClass = ($row['status'] === 'active') ? "status-active" : "status-inactive";

            
            $name = preg_replace("/[\r\n]+/", " ", $row['name']);

            echo "<tr>";
            echo "<td>".htmlspecialchars($row['admin_id'])."</td>";
            echo "<td>".htmlspecialchars($name)."</td>";
            echo "<td>".htmlspecialchars($row['faculty_id'] ?? '')."</td>";
            echo "<td>".htmlspecialchars($row['email'] ?? '')."</td>";
            echo "<td>".htmlspecialchars($row['username'])."</td>";
            echo "<td><span class='$statusClass'>".ucfirst($row['status'])."</span></td>";
            echo "<td>".htmlspecialchars($row['created_at'])."</td>";
            echo "<td class='actions'>
                    <button class='edit-btn'>Edit</button>
                    <button class='delete-btn'>Delete</button>
                  </td>";
            echo "</tr>";
          }

          echo "</table>";
        } else {
          echo "<h3>No admins found.</h3>";
        }

        $conn->close();
        ?>
      </div>
    </div>
  </div>
</body>
</html>
