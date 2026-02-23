<?php
session_start();
include '../db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM employees");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Employees List</h3>
                <a href="../dashboard.php" class="btn btn-secondary">Back</a>
            </div>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td>

                            
                            <?php if ($_SESSION['role'] != 'staff') { ?>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" 
                                   class="btn btn-warning btn-sm">
                                   Edit
                                </a>
                            <?php } ?>

                            
                            <?php if ($_SESSION['role'] == 'admin') { ?>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Delete this employee?')">
                                   Delete
                                </a>
                            <?php } ?>

                        </td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>

        </div>
    </div>
</div>

</body>
</html>