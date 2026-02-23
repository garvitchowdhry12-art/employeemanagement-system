<?php
session_start();
if ($_SESSION['role'] == 'staff') {
    die("Access Denied");
}

include '../db.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    mysqli_query($conn, "UPDATE employees SET
        name='$name',
        email='$email',
        contact='$contact'
        WHERE id=$id");

    header("Location: view.php");
    exit();
}

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM employees WHERE id=$id"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">

            <h3>Edit Employee</h3>

            <form method="POST">
                <input type="text" name="name" class="form-control mb-2" value="<?php echo $data['name']; ?>" required>
                <input type="email" name="email" class="form-control mb-2" value="<?php echo $data['email']; ?>" required>
                <input type="text" name="contact" class="form-control mb-3" value="<?php echo $data['contact']; ?>" required>

                <button class="btn btn-primary">Update</button>
                <a href="view.php" class="btn btn-secondary">Back</a>
            </form>

        </div>
    </div>
</div>

</body>
</html>