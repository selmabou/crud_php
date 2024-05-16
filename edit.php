<?php

require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_GET['id'])) {
       
        $name = $_POST['name'];
        $email = $_POST['email'];
       
        $id = $_GET['id'];

  
        $sql = "UPDATE students SET name = :name, email = :email WHERE id = :id";

        try {
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            
            header("Location: crud.php");
            exit();
        } catch (PDOException $e) {
            
            echo "Erreur lors de la mise à jour de l'enregistrement : " . $e->getMessage();
        }
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
        <br><br>
        <h2>Update:</h2>
        <br>
        <form method="post">
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" id="name" placeholder="Entrez votre nom" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name="email">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

