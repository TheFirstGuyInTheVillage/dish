<?php

namespace App\Entrypoints\Controller\Api\V1;

use InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DishBuilderController extends AbstractController
{
    /**
     * @throws InvalidArgumentException
     */
    #[Route(path: '/dish/build', name: 'dish.build', methods: ['POST'])]
    public function __invoke(Request $request): Response
    {
        return (new Response())
            ->setStatusCode(Response::HTTP_OK)
            ->setContent(json_encode([0 => 'Build will be here soon']));
    }
}