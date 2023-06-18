<?php
declare(strict_types=1);
namespace exceptions;
class InvalidPhoneException extends \RuntimeException
{
   protected $message="numero de telephone invalide";
}