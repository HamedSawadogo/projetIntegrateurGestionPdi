<?php
declare(strict_types=1);
namespace exceptions;

class InvalidEmailException extends  \RuntimeException
{
    protected $message="adresse email invalide";

}