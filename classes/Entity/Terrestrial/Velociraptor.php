<?php

namespace classes\Entity\Terrestrial;

use classes\Entity\Terrestrial;

class Velociraptor extends Terrestrial
{
    private array $compatibleWith = ['Protoceratops'];
    private string $subtype = 'Velociraptor';
    private int $size = 1;
    private int $maximalAge = 180;
    private int $maturityAge = 30;
    private int $height = 50;
    private int $length = 180;
    private int $weight = 15000;
    private string $diet = 'Carnivore';
}
