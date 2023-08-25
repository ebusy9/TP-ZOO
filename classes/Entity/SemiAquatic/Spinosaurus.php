<?php

namespace classes\Entity\SemiAquatic;

use classes\Entity\SemiAquatic;

class Spinosaurus extends SemiAquatic {
    private array $compatibleWith = ['Plesiosaurus', 'Liopleurodon'];
    private string $subtype = 'Spinosaurus';
    private int $size = 3;
    private int $maximalAge = 480;
    private int $maturityAge = 150;
    private int $height = 580;
    private int $length = 17000;
    private int $weight = 7000000;
    private string $diet = 'Carnivore';
}