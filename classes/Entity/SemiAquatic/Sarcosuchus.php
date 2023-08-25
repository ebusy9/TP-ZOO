<?php

namespace classes\Entity\SemiAquatic;

use classes\Entity\SemiAquatic;

class Sarcosuchus extends SemiAquatic {
    private array $compatibleWith = ['Suchomimus', 'Baryonyx'];
    private string $subtype = 'Sarcosuchus';
    private int $size = 2;
    private int $maximalAge = 420;
    private int $maturityAge = 132;
    private int $height = 200;
    private int $length = 11000;
    private int $weight = 8000000;
    private string $diet = 'Carnivore';
}