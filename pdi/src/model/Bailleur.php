<?php
require_once ("Adresse.php");

class Bailleur
{
    private string $nom;
    private Adresse  $adresse;
    private  string  $typeBailleur;

    public  function  __construct(string $nom,string  $type, Adresse  $adresse)
    {
        $this->nom=$nom;
        $this->adresse=$adresse;
        $this->typeBailleur=$type;
    }
    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }
    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return Adresse
     */
    public function getAdresse(): Adresse
    {
        return $this->adresse;
    }

    /**
     * @param Adresse $adresse
     */
    public function setAdresse(Adresse $adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getTypeBailleur(): string
    {
        return $this->typeBailleur;
    }

    /**
     * @param string $typeBailleur
     */
    public function setTypeBailleur(string $typeBailleur): void
    {
        $this->typeBailleur = $typeBailleur;
    }



}