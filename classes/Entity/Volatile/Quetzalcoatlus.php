<?php

namespace classes\Entity\Volatile;

use classes\Entity\Volatile;

class Quetzalcoatlus extends Volatile
{
    private array $compatibleWith = ['Pteranodon', 'Dimorphodon'];
    private string $subtype = 'Quetzalcoatlus';
    private int $size = 3;
    private int $maximalAge = 360;
    private int $maturityAge = 90;
    private int $wingspan = 1100;
    private int $weight = 250000;
    private string $diet = 'Omnivore';
}
