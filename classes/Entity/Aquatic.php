<?php

abstract class Aquatic extends Entity
{
    private int $height;
    private int $length;
    private string $type = 'aquatic';


    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight($height): void
    {
        $this->height = $height;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength($length): void
    {
        $this->length = $length;
    }
}
