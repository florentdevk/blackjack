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
        $aces = 0;

        foreach ($this->cards as $card) {
            $total += $card->numericValue();
            if ($card->rank() === 'Ace') {
                $aces++;
            }
        }

        while ($total > 21 && $aces > 0) {
            $total -= 10;
            $aces--;
        }

        return $total;
    }

    public function isBlackjack(): bool
    {
        return count($this->cards) === 2 && $this->value() === 21;
    }

    public function isBust(): bool
    {
        return $this->value() > 21;
    }
}
