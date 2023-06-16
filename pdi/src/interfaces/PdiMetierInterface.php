<?php

interface PdiMetierInterface
{
    public function getPdisTotalFemmes(): int;
    public function getPdisTotalHommmes(): int;
    public function getPDIsTotalEnfants(): int;
    public function getTotalPDI(): int;
    public function afficherPdiByRegions(): array;
}
