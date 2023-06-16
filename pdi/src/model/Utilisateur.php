<?php
require_once ("src/interfaces/UserMetierInterface.php");
require_once ("src/db/Connection.php");

/**
 * hacher le mot de passe de l'utilisateur
 */
abstract class Utilisateur
{
  protected string  $username;
  protected string  $password;
  protected string  $type;
    /**
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    public  abstract  function getUserType():string;

    /**
     * @return string
     * crypter le mot de passe de l'utilisateur
     */
    public  function  hashPassword():string{
        return hash("sha256",$this->password);
    }
    public  function  checkPassword():bool{
        if(strlen($this->password)>5){
            return  true;
        }
        return  false;
    }
    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}