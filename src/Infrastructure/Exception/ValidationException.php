<?php


namespace App\Infrastructure\Exception;


/**
 * Class ValidationException
 * @package App\Infrastructure\Exception
 */
final class ValidationException extends CException
{

    /**
     * ValidationException constructor.
     * @param string $message
     * @param array $errors
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message, array $errors = [], int $code = null, Throwable $previous = null)
    {
        if(is_null($code)) $code = 422;
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }
}