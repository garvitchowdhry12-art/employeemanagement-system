<?php
session_start();

if ($_SESSION['role'] != 'admin') {
    die("Access Denied");
}

include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    mysqli_query($conn, "INSERT INTO employees (name, email, contact)
                         VALUES ('$name', '$email', '$contact')");

    header("Location: view.php?success=added");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">


<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="../dashboard.php">Employee System</a>

    <div class="ms-auto text-white">
      Welcome, <strong><?php echo $_SESSION['username']; ?></strong>
      <span class="badge bg-info text-dark">
        <?php echo ucfirst($_SESSION['role']); ?>
      </span>
    </div>
  </div>
</nav>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-body">

                    <h3 class="mb-3">
                        <i class="bi bi-person-plus"></i> Add Employee
                    </h3>

                    <form method="POST">

                        <div class="mb-2">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact</label>
                            <input type="text" name="contact" class="form-control" required>
                        </div>

                        <button class="btn btn-primary">
                            <i class="bi bi-save"></i> Save Employee
                        </button>

                        <a href="../dashboard.php" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>