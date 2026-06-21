<?php

namespace App\Domain;

final class Hand
{
    public function __construct(
        private array $cards = []
    ) {}

    public function value(): int
    {
        return 0;
    }
}
