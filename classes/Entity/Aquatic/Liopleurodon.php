<?php

namespace classes\Entity\Aquatic;

use classes\Entity\Aquatic;

class Liopleurodon extends Aquatic {
    private array $compatibleWith = ['Mosasaurus', 'Kronosaurus'];
    private string $subtype = 'Liopleurodon';
    private int $size = 2;
    private int $maximalAge = 300;
    private int $maturityAge = 102;
    private int $height = 350;
    private int $length = 700;
    private int $weight = 3000000;
    private string $diet = 'Carnivore';
}