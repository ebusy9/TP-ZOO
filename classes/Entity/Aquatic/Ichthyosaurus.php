<?php

namespace classes\Entity\Aquatic;

use classes\Entity\Aquatic;

class Ichthyosaurus extends Aquatic {
    private array $compatibleWith = ['Plesiosaurus'];
    private string $subtype = 'Ichthyosaurus';
    private int $size = 1;
    private int $maximalAge = 300;
    private int $maturityAge = 72;
    private int $height = 150;
    private int $length = 4000;
    private int $weight = 250000;
    private string $diet = 'Carnivore';
}