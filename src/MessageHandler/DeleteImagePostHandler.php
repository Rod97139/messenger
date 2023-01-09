<?php

namespace App\MessageHandler;

use App\Message\AddPonkaToImage;
use App\Message\DeleteImagePost;
use App\Photo\PhotoFileManager;
use App\Photo\PhotoPonkaficator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler] // instead of implements MessageHandlerInterface
class DeleteImagePostHandler
{
    
    private $photoManager;
    private $entityManager;

    public function __construct(PhotoFileManager $photoManager, EntityManagerInterface $entityManager) {
        
        $this->photoManager = $photoManager;
        $this->entityManager = $entityManager;

    }

    public function __invoke(DeleteImagePost $deleteImagePost)
    {
        $imagePost = $deleteImagePost->getImagePost();
        $this->photoManager->deleteImage($imagePost->getFilename());

        $this->entityManager->remove($imagePost);
        $this->entityManager->flush();
    }
}
