<?php


class user_manager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }

    public function add(User $user)
    {
        $email = $user->getEmail();
        $checkExistingEmailQuery = $this->_db->prepare('SELECT * FROM client WHERE Email = :email');
        $checkExistingEmailQuery->bindValue(":email", $email);
        $checkExistingEmailQuery->execute();
        
        if ($checkExistingEmailQuery->rowCount() == 0) {
            try {
                $insertQuery = $this->_db->prepare('INSERT INTO client(id_client, Nom, prenom, telephone, Email, mot_de_passe) VALUES(:id, :nom, :prenom, :telephone, :mail, :mdp)');
                $insertQuery->bindValue(':id', $user->getId());
                $insertQuery->bindValue(':nom', $user->getNom());
                $insertQuery->bindValue(':prenom', $user->getPrenom());
                $insertQuery->bindValue(':telephone', $user->getTelephone());
                $insertQuery->bindValue(':mail', $email);
                $insertQuery->bindValue(':mdp', password_hash($user->getPassword(), PASSWORD_DEFAULT));
                $insertQuery->execute();
            } catch (PDOException $e) {
                // Gérer l'erreur, par exemple, afficher un message ou journaliser l'erreur
                echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage();
            }
        } else {
            echo "<script>alert('L'email est déjà utilisé.');</script>";
            exit;
        }
    }
    
    public function addadmin(User $user)
    {
        try {
            $q = $this->_db->prepare('INSERT INTO admin(id_admin,email, mot_de_passe) VALUES(:id, :mail, :mdp)');
            $q->bindValue(':id', $user->getId());

            $q->bindValue(':mail', $user->getEmail());
            $q->bindValue(':mdp', password_hash($user->getPassword(), PASSWORD_DEFAULT));
            $q->execute();
        } catch (PDOException $e) {
            // Gérer l'erreur, par exemple, afficher un message ou journaliser l'erreur
            echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage();
        }
    }

    public function login(User $user)
    {
        try {
            $q = $this->_db->prepare("SELECT id_client, nom, prenom, Email, mot_de_passe FROM client WHERE Email = :email");

            $q->bindValue(":email", $user->getEmail());
            $q->execute();

            // Récupérer les résultats de la requête
            $result = $q->fetch(PDO::FETCH_ASSOC);


            // Vérifier si le mot de passe fourni correspond au mot de passe haché stocké
            if ($result && password_verify($user->getPassword(), $result['mot_de_passe'])) {
                // La connexion a réussi
                // Vous pouvez également stocker l'id_client ou d'autres informations de l'utilisateur dans la session si nécessaire
                $_SESSION['id_client'] = $result['id_client'];
                $_SESSION['nom'] = $result['nom'];
                $_SESSION['prenom'] = $result['prenom'];
                $_SESSION['telephone'] = $result['telephone'];
                $_SESSION['Email'] = $result['Email'];
                $_SESSION['telephone'] = $result['telephone'];
                echo '<meta http-equiv="refresh" content="0;url=index.php">';
            }
        } catch (PDOException $e) {
            echo "Erreur lors du login : " . $e->getMessage();
        }
    }
    public function loginAdmin(User $user)
    {
        try {
            $q = $this->_db->prepare("SELECT id_admin, email, mot_de_passe FROM admin WHERE email = :email");

            $q->bindValue(":email", $user->getEmail());
            $q->execute();

            // Récupérer les résultats de la requête
            $result = $q->fetch(PDO::FETCH_ASSOC);

            // Vérifier si le mot de passe fourni correspond au mot de passe haché stocké
            if ($result && password_verify($user->getPassword(), $result['mot_de_passe'])) {
                // La connexion a réussi
               
                // Vous pouvez également stocker l'id_admin ou d'autres informations de l'utilisateur dans la session si nécessaire
                $_SESSION['id_admin'] = $result['id_admin'];
                $_SESSION['nom'] = "abouzayd";
                $_SESSION['prenom'] = "nacim";
                $_SESSION['Email'] = $result['email']; // Correction ici
                echo '<meta http-equiv="refresh" content="0;url=index.php">';
            }
        } catch (PDOException $e) {
            echo "Erreur lors du login : " . $e->getMessage();
        }
    }

    public function modifierprenom($nouveauprenom)
    {
        $id_client = $_SESSION['id_client'];

        $qUpdate = $this->_db->prepare('UPDATE client SET prenom = :prenom WHERE id_client = :id_client');
        $qUpdate->bindValue(':id_client', $id_client);
        $qUpdate->bindValue(':prenom', $nouveauprenom);



        $qUpdate->execute();



        return true;
    }
    public function modifierNom($nouveauNom)
    {
        $id_client = $_SESSION['id_client'];

        $qUpdate = $this->_db->prepare('UPDATE client SET Nom = :nom WHERE id_client = :id_client');
        $qUpdate->bindValue(':id_client', $id_client);
        $qUpdate->bindValue(':nom', $nouveauNom);

        $qUpdate->execute();

        return true;
    }
    public function modifierTelephone($nouveauTelephone)
    {
        $id_client = $_SESSION['id_client'];

        $qUpdate = $this->_db->prepare('UPDATE client SET telephone = :telephone WHERE id_client = :id_client');
        $qUpdate->bindValue(':id_client', $id_client);
        $qUpdate->bindValue(':telephone', $nouveauTelephone);

        $qUpdate->execute();

        return true;
    }
    public function modifierEmail($nouvelEmail)
    {
        $id_client = $_SESSION['id_client'];

        $qUpdate = $this->_db->prepare('UPDATE client SET Email = :email WHERE id_client = :id_client');
        $qUpdate->bindValue(':id_client', $id_client);
        $qUpdate->bindValue(':email', $nouvelEmail);

        $qUpdate->execute();

        return true;
    }
    public function modifierMotDePasse($nouveauMotDePasse)
    {
        $id_client = $_SESSION['id_client'];

        // Hacher le nouveau mot de passe avant de le stocker dans la base de données
        $hashedPassword = password_hash($nouveauMotDePasse, PASSWORD_DEFAULT);

        $qUpdate = $this->_db->prepare('UPDATE client SET mot_de_passe = :mot_de_passe WHERE id_client = :id_client');
        $qUpdate->bindValue(':id_client', $id_client);
        $qUpdate->bindValue(':mot_de_passe', $hashedPassword);

        $qUpdate->execute();

        return true;
    }

}
