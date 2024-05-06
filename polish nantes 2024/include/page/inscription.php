<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body class="bg-black">
  
<header>
        <video class="absolute Backgroundvideo" autoplay muted loop style="filter: brightness(0.6);">
            <source src="../../ImageVideo/entete/videoBackground.mp4" type="video/mp4">
        </video>


<?php
include("../module/enTete.php");
$cheminFichier = __FILE__;
$infoFichier = pathinfo($cheminFichier);
$nomFichierSansExtension = $infoFichier['filename'];
?>
<div class="h-48 flex items-center justify-center">
    <h1 class="text-7xl text-white mb-14"><?php echo $nomFichierSansExtension;  ?></h1>
</div>
<?php
include("../module/formulaire_inscription.php");


$host = "127.0.0.1:3307";
$dbname = "polish_nantes";
$username = "admin11";
$password = "ADmin11carca-";


try {
    $bd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
// Vérification si le formulaire a été soumis
if (isset($_POST['inscrire'])) {
// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$tel = $_POST['telephone'];
$email = $_POST['email'];
$mdp = $_POST['mdp'];
$mdpconfirme = isset($_POST['mdpconfirme']) ? $_POST['mdpconfirme'] : '';

// Effectuez vos validations
$isValid =
(strlen($nom) >= 1 && strlen($nom) <= 32 && preg_match('/^[a-zA-Z]+$/', $nom)) &&
(strlen($prenom) >= 2 && strlen($prenom) <= 22 && preg_match('/^[a-zA-Z]+$/', $prenom)) &&
(empty($tel) || (strlen($tel) === 10 && ctype_digit($tel))) &&
(filter_var($email, FILTER_VALIDATE_EMAIL)) &&
(strlen($mdp) >= 8 && preg_match('/[A-Z]/', $mdp) && preg_match('/[a-z]/', $mdp) && preg_match('/\d/', $mdp) && preg_match('/\W/', $mdp));

// Si toutes les validations sont réussies, traitez les données du formulaire
if ($isValid) {
    include_once '../../classe/user_manager.php';
    include_once '../../classe/user.php';
    $manager = new user_manager($bd);

    $user = new User([
        'Nom' => $_POST['nom'],
        'Prenom' => $_POST['prenom'],
        'telephone' => $_POST['telephone'],
        'email' => $_POST['email'],
        'password' => $_POST['mdp']
    ]);

    $manager->add($user);

    echo '<meta http-equiv="refresh" content="0;url=connexion.php">';
  
}
}


include("../module/footer.php");

?>

