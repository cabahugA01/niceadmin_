<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "niceadmin";

if (isset($_POST['submit'])) {
    $firstName = trim($_POST['firstName'] ?? '');
    $middleName = trim($_POST['middleName'] ?? '');
    $lastName = trim($_POST['lastName'] ?? '');
    $gender = trim($_POST['gender'] ?? '');
    $studentEmail = trim($_POST['studentEmail'] ?? '');
    $studentId = trim($_POST['studentId'] ?? '');
    $classes = trim($_POST['classes'] ?? '');

    if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($studentEmail) && !empty($studentId) && !empty($classes)) {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO class_registrations (firstName, middleName, lastName, gender, studentEmail, studentId, classes) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $firstName, $middleName, $lastName, $gender, $studentEmail, $studentId, $classes);

        if ($stmt->execute()) {
            echo '<div class="alert alert-success">Registration submitted successfully!</div>';
        } else {
            echo '<div class="alert alert-danger">Error: ' . $stmt->error . '</div>';
        }

        $stmt->close();
        $conn->close();
    } else {
        echo '<div class="alert alert-danger">Please fill all required fields.</div>';
    }
}
?>

<h5 class="card-title text-center mb-4 text-success">Class Registration Form</h5>

<div class="green-form">
<!-- Class Registration Form -->
<form class="row g-3" method="POST" action="">
  <!-- Student Name Row -->
  <div class="col-12">
    <label class="form-label fw-bold">Student Name</label>
  </div>
  <div class="col-md-4">
    <div class="form-floating">
      <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo htmlspecialchars($_POST['firstName'] ?? ''); ?>" required>
      <label for="firstName">First Name</label>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-floating">
      <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Middle Name" value="<?php echo htmlspecialchars($_POST['middleName'] ?? ''); ?>">
      <label for="middleName">Middle Name</label>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-floating">
      <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo htmlspecialchars($_POST['lastName'] ?? ''); ?>" required>
      <label for="lastName">Last Name</label>
    </div>
  </div>

  <!-- Gender and Email Row -->
  <div class="col-md-6">
    <label class="form-label fw-bold">Gender</label>
    <div class="form-floating">
      <select class="form-select" id="gender" name="gender" required>
        <option selected disabled>Please select</option>
        <option value="male" <?php echo (($_POST['gender'] ?? '') == 'male') ? 'selected' : ''; ?>>Male</option>
        <option value="female" <?php echo (($_POST['gender'] ?? '') == 'female') ? 'selected' : ''; ?>>Female</option>
        <option value="other" <?php echo (($_POST['gender'] ?? '') == 'other') ? 'selected' : ''; ?>>Other</option>
      </select>
      <label for="gender">Gender</label>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-floating">
      <input type="email" class="form-control" id="studentEmail" name="studentEmail" placeholder="Student Email" value="<?php echo htmlspecialchars($_POST['studentEmail'] ?? ''); ?>" required>
      <label for="studentEmail">Student Email</label>
    </div>
  </div>

  <!-- Student ID and Classes Row -->
  <div class="col-md-6">
    <div class="form-floating">
      <input type="text" class="form-control" id="studentId" name="studentId" placeholder="Student ID" value="<?php echo htmlspecialchars($_POST['studentId'] ?? ''); ?>" required>
      <label for="studentId">Student ID</label>
    </div>
  </div>
  <div class="col-md-6">
    <label class="form-label fw-bold">List of Classes</label>
    <div class="form-floating">
      <select class="form-select" id="classes" name="classes" required>
        <option selected disabled>Please select</option>
        <option value="math" <?php echo (($_POST['classes'] ?? '') == 'math') ? 'selected' : ''; ?>>Mathematics</option>
        <option value="science" <?php echo (($_POST['classes'] ?? '') == 'science') ? 'selected' : ''; ?>>Science</option>
        <option value="english" <?php echo (($_POST['classes'] ?? '') == 'english') ? 'selected' : ''; ?>>English</option>
        <option value="history" <?php echo (($_POST['classes'] ?? '') == 'history') ? 'selected' : ''; ?>>History</option>
      </select>
      <label for="classes">Classes</label>
    </div>
  </div>

  <div class="col-12 text-center">
    <button type="submit" class="btn btn-success" name="submit">Submit</button>
  </div>
</form><!-- End Class Registration Form -->
</div>
