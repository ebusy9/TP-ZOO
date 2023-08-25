<?php

namespace classes\Entity\Terrestrial;

use classes\Entity\Terrestrial;

class Allosaurus extends Terrestrial
{
    private array $compatibleWith = ['Stegosaurus', 'Diplodocus'];
    private string $subtype = 'Allosaurus';
    private int $size = 2;
    private int $maximalAge = 480;
    private int $maturityAge = 150;
    private int $height = 350;
    private int $length = 1200;
    private int $weight = 2300000;
    private string $diet = 'Carnivore';
}
