<?php

namespace App\Tests\Domain;

use App\Domain\Card;
use App\Domain\Dealer;
use App\Domain\Hand;
use App\Domain\Shoe;
use PHPUnit\Framework\TestCase;

final class DealerTest extends TestCase
{
    public function testDealerHitsUntil17(): void
    {
        $shoe = new Shoe(1);
        $shoe->shuffle();

        $hand = new Hand();
        $hand->addCard(new Card('5', 'Hearts'));
        $hand->addCard(new Card('6', 'Spades'));

        $dealer = new Dealer();
        $dealer->play($hand, $shoe);

        $this->assertGreaterThanOrEqual(17, $hand->value());
    }
}