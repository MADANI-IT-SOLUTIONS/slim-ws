<?php


namespace App\Domain\Animal;


use App\Domain\DomainException\DomainRecordNotFoundException;

class AnimalNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'La methode que vous essayez d\'appeler n\existe pas.';
}