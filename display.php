<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<div class="container" >
<button class="btn btn-primary my-5" > 
    <a href="user.php" class="text-white"> Add New User </a>
</button>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

    <?php
        $sql = "SELECT * FROM `crud`";
        $result=mysqli_query($conn,$sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $id=$row["id"];
                $name=$row["name"];
                $email=$row["email"];
                $password=$row["password"];

                echo'<tr>
                    <th scope="row">'.$id.'</th>
                    <td>
                    '.$name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$password.'</td>
                    <td>
                        <button class="btn btn-primary"><a href="edit.php?editid='.$id.'"class="text-light">Edit</a></button>
                        <button class= "btn btn-danger"><a href="delete.php? deleteid='.$id.'" class="text-light">Delete</a></button>
                    </td>
                    </tr>';
            }
            
        }
    ?>


  
</table>
</div>
    
</body>
</html>