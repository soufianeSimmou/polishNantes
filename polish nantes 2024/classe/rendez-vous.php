<?php 
class rendez_vous 
{
    private $id_rendez_vous;
    private $date;
    private $heure;
    private $formule;
    private $message;
    private $prix;
    private $statue;
    private $voiture;
    private $model;
    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getIdRendezVous()
    {
        return $this->id_rendez_vous;
    }
    public function setIdRendezVous($id_rendez_vous)
    {
        $this->id_rendez_vous = $id_rendez_vous;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }
    public function getHeure()
    {
        return $this->heure;
    }

    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

    public function getFormule()
    {
        return $this->formule;
    }

    public function setprix($prix)
    {
        $this->prix = $prix;
    }

    public function getprix()
    {
        return $this->prix;
    }

    public function setFormule($formule)
    {
        $this->formule = $formule;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getStatue()
    {
        return $this->statue;
    }

    public function setStatue($statue)
    {
        $this->statue = $statue;
    }

    public function getVoiture()
    {
        return $this->voiture;
    }

    public function setVoiture($voiture)
    {
        $this->voiture = $voiture;
    }
}
