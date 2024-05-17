<?php 
session_start();
require_once "connection.php";

if(isset($_POST['save_btn'])){

    $name= $_POST['name'];
    $email = $_POST['email'];

    $query="INSERT INTO students(name, email) VALUES (:name, :email)";
    $query_run= $conn->prepare($query);

    $data= [
        ':name' => $name,
        ':email' => $email
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute){
        $_SESSION['message']= "Inserted successfully";
        header('location: crud.php');
        exit(0);
    }else
    {
        $_SESSION['message']= "Not Inserted ";
        header('location: crud.php');
        exit(0);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="">
    
    <div class="container">
       <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">

                <div class="card-header">
                    <h4>Add students: </h4>
                    <a href="crud.php" class="btn btn-danger float-end"> Back to page</a>
                </div>

                <div class="card-body">
                    
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label>Name: </label>
                            <input type="text" name="name" class="form-control" placeholder="name of student">
                        </div>

                        <div class="mb-3">
                            <label>E-mail: </label>
                            <input type="text" name="email" class="form-control" placeholder="email of student">
                        </div>

                        <div class="mb-3">
                            <button type="submit"  name="save_btn" class="btn btn-primary">Save student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

       </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

