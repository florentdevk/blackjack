<?php

namespace App\Domain;

final class Shoe
{
    private array $cards = [];

    public function __construct(int $decks = 1)
    {
        $ranks = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King', 'Ace'];
        $suits = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];

        for ($i = 0; $i < $decks; $i++) {
            foreach ($suits as $suit) {
                foreach ($ranks as $rank) {
                    $this->cards[] = new Card($rank, $suit);
                }
            }
        }
    }

    public function count(): int
    {
        return count($this->cards);
    }

    public function draw(): Card
    {
        return array_shift($this->cards);
    }

    public function shuffle(): void
    {
        shuffle($this->cards);
    }
}