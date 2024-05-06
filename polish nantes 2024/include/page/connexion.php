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
        session_start();
        include("../module/enTete.php");
        $cheminFichier = __FILE__;
        $infoFichier = pathinfo($cheminFichier);
        $nomFichierSansExtension = $infoFichier['filename'];
        ?>
        <div class="h-48 flex items-center justify-center">
            <h1 class="text-7xl text-white mb-14">
                <?php echo $nomFichierSansExtension; ?>
            </h1>
        </div>
        <?php
        include("../module/formulaire_connexion.php");

        include_once '../../classe/user_manager.php';
        include_once '../../classe/user.php';
        if (isset($_POST['connecter'])) {
            // Récupérer les valeurs du formulaire
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            
            // Validation des champs email et mot de passe
            $isValid = (
                filter_var($email, FILTER_VALIDATE_EMAIL) &&
                (strlen($mdp) >= 8 && preg_match('/[A-Z]/', $mdp) && preg_match('/[a-z]/', $mdp) && preg_match('/\d/', $mdp) && preg_match('/\W/', $mdp))
            );
            
            // Si les champs sont valides
            if ($isValid) {
                // Connexion à la base de données
                include_once '../../classe/user_manager.php';
                include_once '../../classe/user.php';
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
                    exit(); // Arrêter l'exécution du script en cas d'erreur de connexion
                }
                
                // Créer un gestionnaire d'utilisateur
                $userManager = new User_Manager($bd);
                
                // Créer un objet utilisateur avec les données du formulaire
                $user = new User(['email' => $email, 'password' => $mdp]);
                
                // Appeler la fonction de connexion admin
                $userManager->loginAdmin($user);
                $userManager->login($user);
                // Redirection vers une autre page après la connexion réussie
               
            }
        }
        include("../module/footer.php");

        ?>