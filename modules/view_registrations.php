<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "niceadmin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all registrations
$sql = "SELECT id, firstName, middleName, lastName, gender, studentEmail, studentId, classes, timestamp FROM class_registrations ORDER BY timestamp DESC";
$result = $conn->query($sql);

$conn->close();
?>

<h5 class="card-title text-center mb-4 text-success">Class Registrations</h5>

<div class="green-form">
<?php if ($result->num_rows > 0): ?>
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
          <th>Gender</th>
          <th>Email</th>
          <th>Student ID</th>
          <th>Class</th>
          <th>Timestamp</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['firstName']); ?></td>
            <td><?php echo htmlspecialchars($row['middleName'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($row['lastName']); ?></td>
            <td><?php echo htmlspecialchars($row['gender']); ?></td>
            <td><?php echo htmlspecialchars($row['studentEmail']); ?></td>
            <td><?php echo htmlspecialchars($row['studentId']); ?></td>
            <td><?php echo htmlspecialchars($row['classes']); ?></td>
            <td><?php echo htmlspecialchars($row['timestamp']); ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <p class="text-center">No registrations found.</p>
<?php endif; ?>
</div>
