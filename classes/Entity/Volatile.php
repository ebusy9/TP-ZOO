<?php

namespace classes\Entity;

use classes\Entity;

abstract class Volatile extends Entity
{
    private int $wingspan;
    private string $type = 'volatile';

    public function getWingspan(): int
    {
        return $this->wingspan;
    }

    public function setWingspan(int $wingspan): void
    {
        $this->wingspan = $wingspan;
    }
}
