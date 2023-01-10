<?php

namespace App\Message;

class DeletePhotoFile
{
    public function __construct(private string $filename){}

    public function getFilename(): string
    {
        return $this->filename;
    }
}
