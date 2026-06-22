<?php

namespace App\Tests\Domain;

use App\Domain\BasicStrategy;
use App\Domain\Card;
use App\Domain\Decision;
use App\Domain\Hand;
use PHPUnit\Framework\TestCase;

final class BasicStrategyTest extends TestCase
{
    public function testHard16AgainstDealerTenShouldHit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('9', 'Hearts'));
        $hand->addCard(new Card('7', 'Spades'));

        $dealerCard = new Card('10', 'Diamonds');

        $this->assertSame(Decision::Hit, $strategy->decide($hand, $dealerCard));
    }

    public function testHard17ShouldStand(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('King', 'Hearts'));
        $hand->addCard(new Card('7', 'Spades'));

        $dealerCard = new Card('6', 'Diamonds');

        $this->assertSame(Decision::Stand, $strategy->decide($hand, $dealerCard));
    }
    public function testHard12AgainstDealer4ShouldStand(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('7', 'Hearts'));
        $hand->addCard(new Card('5', 'Spades'));

        $dealerCard = new Card('4', 'Diamonds');

        $this->assertSame(Decision::Stand, $strategy->decide($hand, $dealerCard));
    }

    public function testHard13AgainstDealer2ShouldStand(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('7', 'Hearts'));
        $hand->addCard(new Card('6', 'Spades'));

        $dealerCard = new Card('2', 'Diamonds');

        $this->assertSame(Decision::Stand, $strategy->decide($hand, $dealerCard));
    }

    public function testHard11AgainstDealer6ShouldDouble(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('7', 'Hearts'));
        $hand->addCard(new Card('4', 'Spades'));

        $dealerCard = new Card('6', 'Diamonds');

        $this->assertSame(Decision::Double, $strategy->decide($hand, $dealerCard));
    }

    public function testHard10AgainstDealer5ShouldDouble(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('6', 'Hearts'));
        $hand->addCard(new Card('4', 'Spades'));

        $dealerCard = new Card('5', 'Diamonds');

        $this->assertSame(Decision::Double, $strategy->decide($hand, $dealerCard));
    }

    public function testHard9AgainstDealer3ShouldDouble(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('5', 'Hearts'));
        $hand->addCard(new Card('4', 'Spades'));

        $dealerCard = new Card('3', 'Diamonds');

        $this->assertSame(Decision::Double, $strategy->decide($hand, $dealerCard));
    }

    public function testSoft18AgainstDealer5ShouldDouble(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('Ace', 'Hearts'));
        $hand->addCard(new Card('7', 'Spades'));

        $dealerCard = new Card('5', 'Diamonds');

        $this->assertSame(Decision::Double, $strategy->decide($hand, $dealerCard));
    }

    public function testSoft18AgainstDealer2ShouldStand(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('Ace', 'Hearts'));
        $hand->addCard(new Card('7', 'Spades'));

        $dealerCard = new Card('2', 'Diamonds');

        $this->assertSame(Decision::Stand, $strategy->decide($hand, $dealerCard));
    }

    public function testSoft17AgainstDealer4ShouldDouble(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('Ace', 'Hearts'));
        $hand->addCard(new Card('6', 'Spades'));

        $dealerCard = new Card('4', 'Diamonds');

        $this->assertSame(Decision::Double, $strategy->decide($hand, $dealerCard));
    }

    public function testSoft19ShouldAlwaysStand(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('Ace', 'Hearts'));
        $hand->addCard(new Card('8', 'Spades'));

        $dealerCard = new Card('6', 'Diamonds');

        $this->assertSame(Decision::Stand, $strategy->decide($hand, $dealerCard));
    }

    public function testSoft18AgainstDealer9ShouldHit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('Ace', 'Hearts'));
        $hand->addCard(new Card('7', 'Spades'));

        $dealerCard = new Card('9', 'Diamonds');

        $this->assertSame(Decision::Hit, $strategy->decide($hand, $dealerCard));
    }
}