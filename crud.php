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
<body class="bg-info">    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<button class="btn btn-secondary"> Ajouter </button>
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Acceuil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Creer un etudiant</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">

    <div class="card">
    <div class="card-header">
        <h4>All students</h4>

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
                <button class="btn btn-info">update</button>
                <button class="btn btn-danger">delete</button>
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
