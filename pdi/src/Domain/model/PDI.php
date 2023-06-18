<?php

namespace Domain\model;

class PDI
{
    private int $id_pdi;
    private string $nom;
    private string $prenom;
    private string $date_nais;
    private string $lieu_origine;
    private string $sexe;
    private string $nationalite;
    private string $activite;
    private string $localisation;
    private ?string $email;
    private ?string $telephone;

    /**
     * @param string $nom
     * @param string $prenom
     * @param string $date_nais
     * @param string $lieu_origine
     * @param string $sexe
     * @param string $nationalite
     * @param string $activite
     * @param string $localisation
     * @param string|null $email
     * @param string|null $telephone
     */
    public function __construct(string $nom, string $prenom, string $date_nais, string $lieu_origine, string $sexe, string $nationalite, string $activite, string $localisation, ?string $email, ?string $telephone)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_nais = $date_nais;
        $this->lieu_origine = $lieu_origine;
        $this->sexe = $sexe;
        $this->nationalite = $nationalite;
        $this->activite = $activite;
        $this->localisation = $localisation;
        $this->email = $email;
        $this->telephone = $telephone;
    }


    /**
     * @return int
     */
    public function getIdPdi(): int
    {
        return $this->id_pdi;
    }

    /**
     * @param int $id_pdi
     */
    public function setIdPdi(int $id_pdi): void
    {
        $this->id_pdi = $id_pdi;
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
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getDateNais(): string
    {
        return $this->date_nais;
    }

    /**
     * @param string $date_nais
     */
    public function setDateNais(string $date_nais): void
    {
        $this->date_nais = $date_nais;
    }

    /**
     * @return string
     */
    public function getLieuOrigine(): string
    {
        return $this->lieu_origine;
    }

    /**
     * @param string $lieu_origine
     */
    public function setLieuOrigine(string $lieu_origine): void
    {
        $this->lieu_origine = $lieu_origine;
    }

    /**
     * @return string
     */
    public function getSexe(): string
    {
        return $this->sexe;
    }

    /**
     * @param string $sexe
     */
    public function setSexe(string $sexe): void
    {
        $this->sexe = $sexe;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getNationalite(): string
    {
        return $this->nationalite;
    }

    /**
     * @param string $nationalite
     */
    public function setNationalite(string $nationalite): void
    {
        $this->nationalite = $nationalite;
    }

    /**
     * @return string
     */
    public function getActivite(): string
    {
        return $this->activite;
    }

    /**
     * @param string $activite
     */
    public function setActivite(string $activite): void
    {
        $this->activite = $activite;
    }

    /**
     * @return string
     */
    public function getLocalisation(): string
    {
        return $this->localisation;
    }

    /**
     * @param string $localisation
     */
    public function setLocalisation(string $localisation): void
    {
        $this->localisation = $localisation;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }


}