<?php

namespace App\Tests\Domain;

use App\Domain\BasicStrategy;
use App\Domain\Card;
use App\Domain\Decision;
use App\Domain\Hand;
use PHPUnit\Framework\TestCase;

final class BasicStrategyTest extends TestCase
{
    public function testHard16AgainstDealerTenShouldSurrender(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('9', 'Hearts'));
        $hand->addCard(new Card('7', 'Spades'));

        $dealerCard = new Card('10', 'Diamonds');

        $this->assertSame(Decision::Surrender, $strategy->decide($hand, $dealerCard));
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

    public function testSoft15AgainstDealer4ShouldDouble(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('Ace', 'Hearts'));
        $hand->addCard(new Card('4', 'Spades'));

        $dealerCard = new Card('4', 'Diamonds');

        $this->assertSame(Decision::Double, $strategy->decide($hand, $dealerCard));
    }

    public function testSoft13AgainstDealer5ShouldDouble(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('Ace', 'Hearts'));
        $hand->addCard(new Card('2', 'Spades'));

        $dealerCard = new Card('5', 'Diamonds');

        $this->assertSame(Decision::Double, $strategy->decide($hand, $dealerCard));
    }

    public function testHard12AgainstDealer2ShouldHit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('7', 'Hearts'));
        $hand->addCard(new Card('5', 'Spades'));

        $dealerCard = new Card('2', 'Diamonds');

        $this->assertSame(Decision::Hit, $strategy->decide($hand, $dealerCard));
    }

    public function testHard12AgainstDealer3ShouldHit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('7', 'Hearts'));
        $hand->addCard(new Card('5', 'Spades'));

        $dealerCard = new Card('3', 'Diamonds');

        $this->assertSame(Decision::Hit, $strategy->decide($hand, $dealerCard));
    }

    public function testSoft17AgainstDealer7ShouldHit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('Ace', 'Hearts'));
        $hand->addCard(new Card('6', 'Spades'));

        $dealerCard = new Card('7', 'Diamonds');

        $this->assertSame(Decision::Hit, $strategy->decide($hand, $dealerCard));
    }

    public function testSoft13AgainstDealer7ShouldHit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('Ace', 'Hearts'));
        $hand->addCard(new Card('2', 'Spades'));

        $dealerCard = new Card('7', 'Diamonds');

        $this->assertSame(Decision::Hit, $strategy->decide($hand, $dealerCard));
    }

    public function testSoft13AgainstDealer4ShouldHit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('Ace', 'Hearts'));
        $hand->addCard(new Card('2', 'Spades'));

        $dealerCard = new Card('4', 'Diamonds');

        $this->assertSame(Decision::Hit, $strategy->decide($hand, $dealerCard));
    }

    public function testSoft16AgainstDealer7ShouldHit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('Ace', 'Hearts'));
        $hand->addCard(new Card('5', 'Spades'));

        $dealerCard = new Card('7', 'Diamonds');

        $this->assertSame(Decision::Hit, $strategy->decide($hand, $dealerCard));
    }

    public function testHard11AgainstDealerAceShouldHit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('7', 'Hearts'));
        $hand->addCard(new Card('4', 'Spades'));

        $dealerCard = new Card('Ace', 'Diamonds');

        $this->assertSame(Decision::Hit, $strategy->decide($hand, $dealerCard));
    }

    public function testHard10AgainstDealerAceShouldHit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('6', 'Hearts'));
        $hand->addCard(new Card('4', 'Spades'));

        $dealerCard = new Card('Ace', 'Diamonds');

        $this->assertSame(Decision::Hit, $strategy->decide($hand, $dealerCard));
    }

    public function testHard16AgainstDealer9ShouldSurrender(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('9', 'Hearts'));
        $hand->addCard(new Card('7', 'Spades'));

        $dealerCard = new Card('9', 'Diamonds');

        $this->assertSame(Decision::Surrender, $strategy->decide($hand, $dealerCard));
    }

    public function testHard15AgainstDealerTenShouldSurrender(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('9', 'Hearts'));
        $hand->addCard(new Card('6', 'Spades'));

        $dealerCard = new Card('10', 'Diamonds');

        $this->assertSame(Decision::Surrender, $strategy->decide($hand, $dealerCard));
    }

    public function testHard16AgainstDealerAceShouldSurrender(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('9', 'Hearts'));
        $hand->addCard(new Card('7', 'Spades'));

        $dealerCard = new Card('Ace', 'Diamonds');

        $this->assertSame(Decision::Surrender, $strategy->decide($hand, $dealerCard));
    }

    public function testHard8ShouldAlwaysHit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('4', 'Hearts'));
        $hand->addCard(new Card('4', 'Spades'));

        $dealerCard = new Card('6', 'Diamonds');

        $this->assertSame(Decision::Hit, $strategy->decide($hand, $dealerCard));
    }

    public function testHard9AgainstDealer2ShouldHit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('5', 'Hearts'));
        $hand->addCard(new Card('4', 'Spades'));

        $dealerCard = new Card('2', 'Diamonds');

        $this->assertSame(Decision::Hit, $strategy->decide($hand, $dealerCard));
    }

    public function testHard9AgainstDealer7ShouldHit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('5', 'Hearts'));
        $hand->addCard(new Card('4', 'Spades'));

        $dealerCard = new Card('7', 'Diamonds');

        $this->assertSame(Decision::Hit, $strategy->decide($hand, $dealerCard));
    }

    public function testHard16AgainstDealer7ShouldHit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('9', 'Hearts'));
        $hand->addCard(new Card('7', 'Spades'));

        $dealerCard = new Card('7', 'Diamonds');

        $this->assertSame(Decision::Hit, $strategy->decide($hand, $dealerCard));
    }

    public function testPairOf8sShouldAlwaysSplit(): void
    {
        $strategy = new BasicStrategy();

        $hand = new Hand();
        $hand->addCard(new Card('8', 'Hearts'));
        $hand->addCard(new Card('8', 'Spades'));

        $dealerCard = new Card('6', 'Diamonds');

        $this->assertSame(Decision::Split, $strategy->decide($hand, $dealerCard));
    }
}