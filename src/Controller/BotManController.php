<?php

declare(strict_types=1);

namespace App\Controller;

use BotMan\BotMan\BotMan;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BotManController
{
    private Botman $botMan;
    private PriceService $priceService;

    public function __construct(BotMan $botMan, PriceService $priceService)
    {
        $this->botMan = $botMan;
        $this->priceService = $priceService;
    }

    /**
     * @Route(path="/botman", name="app_botman")
     */
    public function __invoke(): Response
    {
        # basic
        $this->botMan->hears('Hello', function(BotMan $bot) {
            $bot->reply('Hello back.');
        });

        $this->botMan->hears('How are you?', function(BotMan $bot) {
            $bot->reply('I am good.');
        });

        $this->botMan->hears('My name is {name}', function(BotMan $bot, string $name) {
            $bot->reply(sprintf('Hello %s.', ucwords($name)));
        });


        # fallback
        $this->botMan->fallback(function (BotMan $bot) {
            $bot->reply('Sorry, I don\'t understand!');
        });

        $this->botMan->listen();

        return new Response();
    }
}
