<?php

class Besoin
{
   private string  $besoin;
   private int $id;
   private  int $idPdi;

   public  function  __construct()
   {

   }

    /**
     * @return string
     */
    public function getBesoin(): string
    {
        return $this->besoin;
    }

    /**
     * @param string $besoin
     */
    public function setBesoin(string $besoin): void
    {
        $this->besoin = $besoin;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIdPdi(): int
    {
        return $this->idPdi;
    }

    /**
     * @param int $idPdi
     */
    public function setIdPdi(int $idPdi): void
    {
        $this->idPdi = $idPdi;
    }


}