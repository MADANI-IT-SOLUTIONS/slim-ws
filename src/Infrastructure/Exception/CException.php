<?php


namespace App\Infrastructure\Exception;


/**
 * Class CException
 * @package App\Infrastructure\Exception
 */
class CException extends Exception
{

    /**
     * @var
     */
    protected $errors;


    /**
     * @return array
     */
    public function getErrors() : array
    {
        return $this->errors;
    }
}