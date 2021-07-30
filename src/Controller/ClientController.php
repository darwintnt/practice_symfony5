<?php

namespace App\Controller;

use App\Entity\Client;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientController extends AbstractController
{
    private $logger;

    private $em;


    public function __construct(LoggerInterface $logger, EntityManagerInterface $em)
    {
        $this->logger = $logger;
        $this->em = $em;
    }

    /**
     * @Route("/clients", name="clients")
     */
    public function index(): JsonResponse
    {
        return new JsonResponse([
            'message' => 'ok',
            'data' => [
                ['nombre' => 'Pepito'],
                ['nombre' => 'Jose'],
                ['nombre' => 'Lucas'],
                ['nombre' => 'Miguel'],
            ]
        ]);
    }

    /**
     * @Route("/clients/show", name="clients")
     */
    public function show(Request $request): JsonResponse
    {
        $this->logger->info('show client logs');
        return new JsonResponse([
            'message' => 'ok',
            'data' => [
                ['nombre' => 'Pepito'],
            ]
        ]);
    }

    /**
     * @Route("/clients/show", name="clients")
     */
    public function store(Request $request)
    {
        $client = new Client();
    }
}
