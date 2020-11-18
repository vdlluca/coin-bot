<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    /**
     * @Route(path="/chat", name="app_chat")
     */
    public function __invoke(): Response
    {
        return $this->render('Chat/view.html.twig');
    }
}
