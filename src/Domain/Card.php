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
        return match ($this->rank) {
            'Jack', 'Queen', 'King' => 10,
            'Ace' => 11,
            default => (int) $this->rank,
        };
    }
}
