<?php

namespace Domain\model;

use AgentEnregistrementInterface;
use Domain\managers\PdiManager;

require_once("src/model/Utilisateur.php");
require_once("src/interfaces/AgentEnregistrementInterface.php");
require_once("src/managers/PdiManager.php");

/**
 * agent d'enregistrement  qui enregistres les personnes  déplacés internes
 */
class AgentEnregistrement extends Utilisateur implements AgentEnregistrementInterface
{
    private PdiManager $manager;

    public function __construct(string $username, string $password)
    {
        parent::__construct($username, $password);
        $this->manager = new PdiManager();
    }

    /**
     * @return string
     * renvoyer le type d'utilisateur
     */
    public function getUserType(): string
    {
        return "AGENT_ENREGISTREMENT";
    }

    /**
     * @param PDI $pdi
     * @return void
     * ajouter un PDI dans la base de donnée par son identifiant
     */
    public function addPDI(PDI $pdi): void
    {
        $this->manager->addEntity($pdi);
    }

    /**
     * @param int $id
     * @return void
     * supprimer un PDI dans la base de donnée par son ID
     */
    public function deletePDI(int $id): void
    {
        $this->manager->deleteEntityByID($id);
    }

    /**
     * @param int $id
     * @return mixed
     * rechercher un PDI par son ID
     */
    public function getPdiByID(int $id)
    {
        return $this->manager->getEntityByID($id);
    }

    /**
     * @return array
     * renvoyer la liste des PDI enrégistrés
     */
    public function getPdiList(): array
    {
        return $this->manager->getEntityList();
    }
}