<?php


namespace App\Domain\Animal;


final class AnimalService
{
    /**
     * @var AnimalRespository
     */
    private $repository;

    /**
     * AnimalService constructor.
     * @param AnimalRespository $repository
     */
    public function __construct(AnimalRespository $repository)
    {
        $this->repository = $repository;
    }

    public function findAll()
    {
        return $this->repository->getAllAnimals();
    }

}