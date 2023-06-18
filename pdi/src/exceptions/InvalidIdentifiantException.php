<?php
declare(strict_types=1);
namespace exceptions;
class InvalidIdentifiantException extends \RuntimeException
{
   protected $message="une erreur est survenu identifiant invalide";
}