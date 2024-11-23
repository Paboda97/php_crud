<?php
include 'connect.php';

session_start();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO crud (name, email, password) VALUES ('$name', '$email', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
       
        $_SESSION['success_message'] = "Data inserted successfully!";
        
        header("Location: display.php");
        exit();
    } else {
        die(mysqli_error($conn));
    }
}

    if (isset($_SESSION['success_message'])) {
        echo $_SESSION['success_message'];
       
        unset($_SESSION['success_message']);
    }
    ?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP CRUD</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
        <div class="mb-3">
            <label >Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off">
        </div>
        <div class="mb-3">
            <label >E-mail</label>
            <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off">
        </div>
        <div class="mb-3">
            <label >Password</label>
            <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    </div>
        
  </body>
</html>


