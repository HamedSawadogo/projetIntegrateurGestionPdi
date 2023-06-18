<?php

class MoyenSubsistance
{
    private int $id;
    private string $subsistance;

    public  function  __construct($subsistance)
    {
        $this->subsistance=$subsistance;
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
     * @return string
     */
    public function getSubsistance(): string
    {
        return $this->subsistance;
    }

    /**
     * @param string $subsistance
     */
    public function setSubsistance(string $subsistance): void
    {
        $this->subsistance = $subsistance;
    }



}