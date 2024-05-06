<?php 
class User 
{
    private $id;
    private $Nom;
    private $Prenom;
    private $telephone;
    private $email;
    private $password;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
       
        $this->id = $id;
    }
    public function getNom() {
        return $this->Nom;
    }

    public function setNom($Nom) {
        $this->Nom = $Nom;
    }

    public function getPrenom() {
        return $this->Prenom;
    }

    public function setPrenom($Prenom) {
        $this->Prenom = $Prenom;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}