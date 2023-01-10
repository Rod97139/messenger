<?php

namespace App\MessageHandler;

use App\Message\AddPonkaToImage;
use App\Photo\PhotoFileManager;
use App\Photo\PhotoPonkaficator;
use App\Repository\ImagePostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler] // instead of implements MessageHandlerInterface
class AddPonkaToImageHandler implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    public function __construct(
        private PhotoPonkaficator $ponkaficator,
        private PhotoFileManager $photoManager,
        private EntityManagerInterface $entityManager,
        private ImagePostRepository $imagePostRepository
        ){}

    public function __invoke(AddPonkaToImage $addPonkaToImage)
    {
        $imagePostId = $addPonkaToImage->getImagePostId();
        $imagePost = $this->imagePostRepository->find($imagePostId);

        if (!$imagePost) {
            // could throw an exeption... it would be retried
            // or return & this message will be discarded

            if ($this->logger) {
                $this->logger->alert(sprintf('Image post %d was missing', $imagePostId));
            }

            return;
        }

        $updatedContents = $this->ponkaficator->ponkafy(
            $this->photoManager->read($imagePost->getFilename())
        );
        $this->photoManager->update($imagePost->getFilename(), $updatedContents);
        $imagePost->markAsPonkaAdded();
        $this->entityManager->flush();
    }
}
