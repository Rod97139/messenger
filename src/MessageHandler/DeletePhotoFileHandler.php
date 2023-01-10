<?php

namespace App\MessageHandler;

use App\Message\DeletePhotoFile;
use App\Photo\PhotoFileManager;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class DeletePhotoFileHandler
{
    public function __construct(private PhotoFileManager $photoManager){}

    public function __invoke(DeletePhotoFile $deletePhotoFile)
    {
        $this->photoManager->deleteImage($deletePhotoFile->getFilename());
    }
}
