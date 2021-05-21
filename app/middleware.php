<?php
declare(strict_types=1);

use App\Infrastructure\Exception\CException;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\App;

return function (App $app) {

    $app->addBodyParsingMiddleware();

    // Add the Slim built-in routing middleware
    $app->addRoutingMiddleware();

//		$app->add(BasePathMiddleware::class);

    // Define Custom Error Handler
    $customErrorHandler = function (
        ServerRequestInterface $request,
        Throwable $exception,
        bool $displayErrorDetails,
        bool $logErrors,
        bool $logErrorDetails,
        ?LoggerInterface $logger = null
    ) use ($app) {
//			$logger->error($exception->getMessage());

        $payload = [
            'success' => false,
            'data' => [
                'message' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'errors' => $exception instanceof CException ? $exception->getErrors() : null
            ]
        ];

        $response = $app->getResponseFactory()->createResponse();
        $response->getBody()->write(
            json_encode($payload, JSON_UNESCAPED_UNICODE)
        );

        return $response;
    };

    // Catch exceptions and errors
//		$app->add(ErrorMiddleware::class);

    $errorMiddleware = $app->addErrorMiddleware(true, true, true);
    $errorMiddleware->setDefaultErrorHandler($customErrorHandler);
};
