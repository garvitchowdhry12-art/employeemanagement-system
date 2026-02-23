<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">


<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php">Employee System</a>

    <div class="ms-auto text-white">
      Welcome, <strong><?php echo $username; ?></strong>
      <span class="badge bg-info text-dark">
        <?php echo ucfirst($role); ?>
      </span>
    </div>
  </div>
</nav>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-body">

                    <h2 class="mb-3">Dashboard</h2>
                    <p class="text-muted">Select an action below</p>

                    <hr>

                    <div class="d-flex gap-2 flex-wrap">

                        
                        <?php if ($role == 'admin') { ?>
                            <a href="employees/add.php" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Add Employee
                            </a>
                        <?php } ?>

                        
                        <a href="employees/view.php" class="btn btn-success">
                            <i class="bi bi-eye"></i> View Employees
                        </a>

                        <a href="logout.php" class="btn btn-danger">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>