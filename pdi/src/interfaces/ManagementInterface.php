<?php


interface ManagementInterface
{
    public function addEntity($entity): void;
    public function deleteEntityByID(int $id): void;
    public function getEntityByID(int $id);
    public function getEntityList():array;
}