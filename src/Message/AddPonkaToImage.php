<?php

namespace App\Message;


class AddPonkaToImage
{
    private $imagePostId;

    public function __construct(int $imagePostId) {
        $this->imagePostId = $imagePostId;
    }

    public function getImagePostId(): int
    {
        return $this->imagePostId;
    }
}
