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
}