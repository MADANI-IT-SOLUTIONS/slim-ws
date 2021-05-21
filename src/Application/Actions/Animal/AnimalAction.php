<?php

declare(strict_types=1);
namespace App\Application\Actions\Animal;

use App\Domain\Animal\AnimalService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AnimalAction  {

    /**
     * @var AnimalService
     */
    private $animalService;

    /**
     * AnimalAction constructor.
     * @param AnimalService $animalService
     */
    public function __construct(AnimalService $animalService)
    {
        $this->animalService = $animalService;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        $data = $this->animalService->findAll();

        if(!empty($data)){
            $result = [
                'success' => true,
                'data' => $data
            ];
        } else {
            $result = [
                'success' => false,
                'data' => null,
                'message' => "Aucun Animal enregistré"
            ];
        }

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }


}