<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\ErrorHandler\Exception\FlattenException;

class ErrorController extends AbstractController
{
    #[Route('/error', name: 'app_error')]
    public function show(FlattenException $exception)
    {
        //return new Response($exception->getMessage());

        $message = $exception->getMessage();

        return $this->render(
            'exception/index.html.twig',
            ['message' => $message]
        );
    }
}
