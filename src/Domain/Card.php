<?php

namespace App\Domain;

final class Card
{
    public function __construct(
        private readonly string $rank,
        private readonly string $suit
    ) {}

    public function numericValue(): int
    {
        return (int) $this->rank;
    }
}
