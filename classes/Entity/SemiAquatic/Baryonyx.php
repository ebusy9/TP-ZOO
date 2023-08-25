<?php

namespace classes\Entity\SemiAquatic;

use classes\Entity\SemiAquatic;

class Baryonyx extends SemiAquatic {
    private array $compatibleWith = ['Suchomimus', 'Irritator'];
    private string $subtype = 'Baryonyx';
    private int $size = 2;
    private int $maximalAge = 420;
    private int $maturityAge = 78;
    private int $height = 250;
    private int $length = 9500;
    private int $weight = 1700000;
    private string $diet = 'Carnivore';
}