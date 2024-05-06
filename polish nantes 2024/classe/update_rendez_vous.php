
<?php
include_once 'manager_rdv.php';
$host = "127.0.0.1:3307";
$dbname = "polish_nantes";
$username = "root";
$password = "";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';

// Vérifier si la requête est une requête POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données JSON de la requête
    $data = json_decode(file_get_contents('php://input'));

    try {
        $bd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        $manager = new manager_rdv($bd);

        // Vérifier si l'ID du rendez-vous est présent dans les données
        if (isset($data->idRendezVous)) {
            $idRendezVous = $data->idRendezVous;

            // Instanciation du gestionnaire de rendez-vous
            $manager->update_rdv($idRendezVous);

            // Envoi de l'e-mail de confirmation
            $mail = new PHPMailer(true);
          
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'polishpro44@gmail.com';
            $mail->Password = 'oetq czoc bzes wivy';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
    
            $mail->setFrom('polishpro44@gmail.com');
            $mail->addAddress($manager->email_rdv($idRendezVous));
            $mail->isHTML(true);
    
            $mail->Subject = 'Confirmation de votre rendez-vous chez Polish Nantes';
    
            $mail->Body = "Nous sommes ravis de vous informer que votre rendez-vous chez Polish Nantes a été confirmé avec succès.
    
            <br><br>Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter. 
    
            <br><br>Nous avons hâte de vous accueillir et de vous offrir une expérience exceptionnelle chez Polish Nantes.
    
            <br><br>Cordialement,
            <br>L'équipe Polish Nantes
    
            <br><br>Pour visualiser votre rendez-vous en ligne, veuillez accéder à votre compte sur notre site : https://polishnantes.com/connexion.php";
    
           
            $mail->send();

            // Répondre avec un succès (par exemple, un code JSON) et l'ID du rendez-vous
            echo json_encode(['success' => true, 'idRendezVous' => $idRendezVous]);
        } else {
            // Répondre avec une erreur si l'ID du rendez-vous n'est pas présent
            echo json_encode(['error' => 'ID du rendez-vous non fourni']);
        }
    } catch (PDOException $e) {
        // Répondre avec une erreur en cas d'échec de la connexion à la base de données
        echo json_encode(['error' => 'Erreur de connexion à la base de données: ' . $e->getMessage()]);
    } catch (Exception $e) {
        // Répondre avec une erreur en cas d'échec de l'envoi de l'e-mail
        echo json_encode(['error' => 'Erreur lors de l\'envoi de l\'e-mail: ' . $e->getMessage()]);
    }
} else {
    // Répondre avec une erreur si ce n'est pas une requête POST
    echo json_encode(['error' => 'Requête non autorisée']);
}
?>
