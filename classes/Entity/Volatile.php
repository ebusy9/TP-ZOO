<?php

abstract class Volatile extends Entity
{
    private int $wingspan;
    private string $type = 'volatile';

    public function getWingspan(): int
    {
        return $this->wingspan;
    }

    public function setWingspan($wingspan): void
    {
        $this->wingspan = $wingspan;
    }
}
