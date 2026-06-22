<?php

namespace App\Tests\Domain;

use App\Domain\Card;
use App\Domain\Hand;
use PHPUnit\Framework\TestCase;

final class HandTest extends TestCase
{
    public function testEmptyHandHasValueOfZero(): void
    {
        $hand = new Hand();

        $this->assertSame(0, $hand->value());
    }

    public function testHandWithOneCardReturnsCardValue(): void
    {
        $hand = new Hand();
        $hand->addCard(new Card('7', 'Hearts'));

        $this->assertSame(7, $hand->value());
    }

    public function testAceCountsAsOneWhenHandWouldBust(): void
    {
        $hand = new Hand();
        $hand->addCard(new Card('Ace', 'Hearts'));
        $hand->addCard(new Card('King', 'Spades'));
        $hand->addCard(new Card('5', 'Diamonds'));

        $this->assertSame(16, $hand->value());
    }

    public function testNaturalBlackjackWithAceAndKing(): void
    {
        $hand = new Hand();
        $hand->addCard(new Card('Ace', 'Hearts'));
        $hand->addCard(new Card('King', 'Spades'));

        $this->assertTrue($hand->isBlackjack());
    }

    public function testThreeCardTwentyOneIsNotBlackjack(): void
    {
        $hand = new Hand();
        $hand->addCard(new Card('7', 'Hearts'));
        $hand->addCard(new Card('7', 'Spades'));
        $hand->addCard(new Card('7', 'Diamonds'));

        $this->assertFalse($hand->isBlackjack());
    }
}
