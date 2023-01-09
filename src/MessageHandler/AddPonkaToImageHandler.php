<?php

namespace App\MessageHandler;

use App\Message\AddPonkaToImage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler] // instead of implements MessageHandlerInterface
class AddPonkaToImageHandler
{
    public function __invoke(AddPonkaToImage $addPonkaToImage)
    {
        dump($addPonkaToImage);
    }
}
