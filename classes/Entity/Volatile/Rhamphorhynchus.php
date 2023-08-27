<?php

namespace classes\Entity\Volatile;

use classes\Entity\Volatile;

class Rhamphorhynchus extends Volatile
{
    private array $compatibleWith = ['Pteranodon', 'Dimorphodon'];
    private string $subtype = 'Rhamphorhynchus';
    private int $size = 1;
    private int $maximalAge = 180;
    private int $maturityAge = 30;
    private int $wingspan = 150;
    private int $weight = 500;
    private string $diet = 'Piscivore';
}
