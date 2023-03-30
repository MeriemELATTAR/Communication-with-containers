<html>
    <head>
    <title>FORMULAIRE</title>
    </head>
    <body>
    <form action="index.php" method="POST">
        <label for="name">Nom:</label>
        <input type="text" name="name" required>
      
        <label for="email">Email:</label>
        <input type="email" name="email" required>
      
        <button type="submit">envoyer</button>
      </form>
    </body>
      
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$host = 'mysql_db'; // Adresse du serveur MySQL
$dbname = 'mysql'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur MySQL
$password = ''; // Mot de passe MySQL

try {
    $nom = $_POST["name"];
    $email = $_POST["email"];
    // Créer une connexion PDO à la base de données MySQL
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Préparation de la requête d'insertion avec des paramètres nommés
$stmt = $conn->prepare("INSERT INTO  personne(nom, email) VALUES (:nom, :email)");

// Liaison des valeurs aux paramètres nommés
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':email', $email);

// Exécution de la requête d'insertion
$stmt->execute();
    // Configurer le mode d'erreur pour afficher les exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Personne ajoutée !";
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
}
?>