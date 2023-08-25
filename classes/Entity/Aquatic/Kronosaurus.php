<?php

namespace classes\Entity\Aquatic;

use classes\Entity\Aquatic;

class Kronosaurus extends Aquatic {
    private array $compatibleWith = ['Mosasaurus', 'Liopleurodon'];
    private string $subtype = 'Kronosaurus';
    private int $size = 2;
    private int $maximalAge = 360;
    private int $maturityAge = 108;
    private int $height = 400;
    private int $length = 1000;
    private int $weight = 8000000;
    private string $diet = 'Carnivore';
}