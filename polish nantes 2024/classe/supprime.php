<?php
include_once 'manager_rdv.php';
$host = "127.0.0.1:3307";
$dbname = "polish_nantes";
$username = "root";
$password = "";

try {
    $bd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
$manager = new manager_rdv($bd);


// include('config.php');

// Vérifier si la requête est une requête POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données JSON de la requête
    $data = json_decode(file_get_contents('php://input'));

    // Vérifier si l'ID du rendez-vous est présent dans les données
    if (isset($data->idRendezVous)) {
        $idRendezVous = $data->idRendezVous;

        // Inclure le gestionnaire de rendez-vous
  

        // Créer une instance du gestionnaire de rendez-vous
        $manager->supprimerRendezVous($idRendezVous);

        // Répondre avec un succès (par exemple, un code JSON)
        echo json_encode(['success' => true]);
    } else {
        // Répondre avec une erreur si l'ID du rendez-vous n'est pas présent
        echo json_encode(['error' => 'ID du rendez-vous non fourni']);
    }
} else {
    // Répondre avec une erreur si ce n'est pas une requête POST
    echo json_encode(['error' => 'Requête non autorisée']);
}




