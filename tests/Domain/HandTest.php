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

    public function testHandIsBustWhenValueExceeds21(): void
    {
        $hand = new Hand();
        $hand->addCard(new Card('King', 'Hearts'));
        $hand->addCard(new Card('Queen', 'Spades'));
        $hand->addCard(new Card('5', 'Diamonds'));

        $this->assertTrue($hand->isBust());
    }

    public function testHandWithAceCountedAs11IsSoft(): void
    {
        $hand = new Hand();
        $hand->addCard(new Card('Ace', 'Hearts'));
        $hand->addCard(new Card('6', 'Spades'));

        $this->assertTrue($hand->isSoft());
    }

    public function testHandWithTwoIdenticalRanksIsPair(): void
    {
        $hand = new Hand();
        $hand->addCard(new Card('8', 'Hearts'));
        $hand->addCard(new Card('8', 'Spades'));

        $this->assertTrue($hand->isPair());
    }

    public function testHandWithDifferentRanksIsNotPair(): void
    {
        $hand = new Hand();
        $hand->addCard(new Card('8', 'Hearts'));
        $hand->addCard(new Card('9', 'Spades'));

        $this->assertFalse($hand->isPair());
    }

    public function testPairRankReturnsCardRank(): void
    {
        $hand = new Hand();
        $hand->addCard(new Card('8', 'Hearts'));
        $hand->addCard(new Card('8', 'Spades'));

        $this->assertSame('8', $hand->pairRank());
    }
}
