<?php

declare(strict_types=1);

namespace App\Controller;

use BotMan\BotMan\BotMan;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BotManController
{
    private Botman $botMan;

    public function __construct(BotMan $botMan)
    {
        $this->botMan = $botMan;
    }

    /**
     * @Route(path="/botman", name="app_botman")
     */
    public function __invoke(): Response
    {
        $this->botMan->fallback(function (BotMan $bot) {
            $bot->reply('Sorry, I don\'t understand!');
        });

        $this->botMan->listen();

        return new Response();
    }
}
