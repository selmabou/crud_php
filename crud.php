<?php
require_once "connection.php";

try {
  $stmt = $conn->prepare("SELECT id, name, email FROM students");
  $stmt->execute();

  $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

 

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-secondary">    



<div class="container mt-5">

    <div class="card">
    <div class="card-header">
        <table>
          <tr>
            <th><h4>All students</h4></th>
            <th><button class="btn btn-danger"> Ajouter </button></th> 
          </tr>
        </table>
    </div>  
    
    
    <div class="card-body">
    <table class="table table-striped">
    <thead>
        
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($students as $student): ?>
        <tr>
            <td><?php echo $student["id"]?></td>
            <td><?php echo $student["name"]?></td>
            <td><?php echo $student["email"]?></td>
            <td>
                
                <a href="edit.php?id=<?php echo $student['id'] ?>"  class="btn btn-info">update</a>
                <a href="delete.php?id=<?php echo $student['id'] ?>"  class="btn btn-danger">delete</a>
            </td>
        </tr>

    <?php endforeach  ?>  
    </tbody>

    </table>
    </div>
   
    </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
