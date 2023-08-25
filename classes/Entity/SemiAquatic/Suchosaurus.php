<?php

namespace classes\Entity\SemiAquatic;

use classes\Entity\SemiAquatic;

class Suchosaurus extends SemiAquatic {
    private array $compatibleWith = ['Suchomimus', 'Baryonyx'];
    private string $subtype = 'Suchosaurus';
    private int $size = 1;
    private int $maximalAge = 300;
    private int $maturityAge = 84;
    private int $height = 200;
    private int $length = 900;
    private int $weight = 1500000;
    private string $diet = 'Carnivore';
}