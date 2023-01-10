<?php

namespace App\MessageHandler;

use App\Message\AddPonkaToImage;
use App\Message\DeleteImagePost;
use App\Message\DeletePhotoFile;
use App\Photo\PhotoFileManager;
use App\Photo\PhotoPonkaficator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler] // instead of implements MessageHandlerInterface
class DeleteImagePostHandler
{
    public function __construct(
        private MessageBusInterface $messageBus,
        private EntityManagerInterface $entityManager
        ) {}

    public function __invoke(DeleteImagePost $deleteImagePost)
    {
        $imagePost = $deleteImagePost->getImagePost();
        $filename = $imagePost->getFilename();
 
        $this->entityManager->remove($imagePost);
        $this->entityManager->flush();

        $this->messageBus->dispatch(new DeletePhotoFile($filename));
    }
}
