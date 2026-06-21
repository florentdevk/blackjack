<?php

namespace App\Domain;

final class Card
{
    private const VALID_RANKS = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King', 'Ace'];
    private const VALID_SUITS = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];

    public function __construct(
        private readonly string $rank,
        private readonly string $suit,
    ) {
        if (!in_array($rank, self::VALID_RANKS, true)) {
            throw new \InvalidArgumentException("Invalid rank: {$rank}");
        }

        if (!in_array($suit, self::VALID_SUITS, true)) {
            throw new \InvalidArgumentException("Invalid suit: {$suit}");
        }
    }

    public function numericValue(): int
    {
        return match ($this->rank) {
            'Jack', 'Queen', 'King' => 10,
            'Ace' => 11,
            default => (int) $this->rank,
        };
    }

    public function rank(): string
    {
        return $this->rank;
    }

    public function suit(): string
    {
        return $this->suit;
    }
}
