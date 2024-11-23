<?php
include 'connect.php';

// Check if `editid` is passed
$id = $_GET['editid'];
$sql = "SELECT * FROM `crud` WHERE id=$id";
$result = mysqli_query($conn, $sql);

// Fetch the record
if ($result) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $email = $row['email'];
    $password = $row['password'];
} else {
    die("Error fetching data: " . mysqli_error($conn));
}

// Handle the update logic when the update button is clicked
if (isset($_POST['update'])) { // Change from 'submit' to 'update'
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Update query
    $sql = "UPDATE `crud` SET name='$name', email='$email', password='$password' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:display.php'); // Redirect to the display page
        exit(); // Prevent further code execution
    } else {
        die("Error updating record: " . mysqli_error($conn));
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>PHP CRUD</title>
</head>
<body>
    <div class="container my-5">
        <h2>Update User</h2>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($name); ?>" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email); ?>" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="<?= htmlspecialchars($password); ?>" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
    </div>
</body>
</html>
