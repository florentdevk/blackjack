<?php

namespace App\Domain;

final class Hand
{
    public function __construct(
        private array $cards = []
    ) {}

    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    public function value(): int
    {
        $total = 0;
        foreach ($this->cards as $card) {
            $total += $card->numericValue();
        }
        return $total;
    }
}
