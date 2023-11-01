<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <link href="https://www.code-couleur.com/" rel="stylesheet">
    <link rel="stylesheet" href="style4.css">
</head>

<body>
   <section id="contact">
        <h5>Contactez-nous</h5>
        
        <?php
        $host = 'host';
        $dbname = 'submissions';
        $username = 'root';
        $password = 'Jojukalo';
        
        try {
            $dbh = new PDO("mysql:host=127.0.0.1;dbname=$dbname", $username, $password);
        
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nom = $_POST['nom'];
                $prenom = $_POST['prénom'];
                $email = $_POST['email'];
                $telephone = $_POST['téléphone'];
                $message = $_POST['message'];
               
                $query = "INSERT INTO submissions (nom, prénom, email, téléphone, message) VALUES (:nom, :prenom, :email, :telephone, :message)";
                $stmt = $db->prepare($query);
                $stmt->execute(array(':nom' => $nom, ':prénom' => $prenom, ':email' => $email, ':téléphone' => $telephone, ':message' => $message));
        
                echo "Merci pour votre soumission !";
            }
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
               
        ?>

        
        
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div>
            <label for="Nom">Nom :</label>
            <input type="text" name="nom" id="nom" required><br>
        </div>
        <div>
            <label for="Prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" required><br>
        </div>
         <div>   
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required><br>
         </div>
         <div>                 
            <label for="telephone">Téléphone</label>
            <input type="telephone" name="telephone" id="telephone" required><br>
         </div>
          <div>  
            <label for="message">Message :</label>
            <textarea name="message" id="message" rows="5" required></textarea><br>
          </div>
          <div>
            <input type="submit" value="Envoyer">
          </div>
         
    </form>                    
  </body>
</html>                

