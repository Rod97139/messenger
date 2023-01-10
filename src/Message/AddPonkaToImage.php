<?php

namespace App\Message;


class AddPonkaToImage
{
    public function __construct(private int $imagePostId){}

    public function getImagePostId(): int
    {
        return $this->imagePostId;
    }
}
