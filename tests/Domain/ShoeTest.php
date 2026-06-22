<?php

namespace App\Tests\Domain;

use App\Domain\Card;
use App\Domain\Shoe;
use PHPUnit\Framework\TestCase;

final class ShoeTest extends TestCase
{
    public function testShoeWithOneDeckHas52Cards(): void
    {
        $shoe = new Shoe(1);

        $this->assertSame(52, $shoe->count());
    }

    public function testDrawReturnsACard(): void
    {
        $shoe = new Shoe(1);
        $card = $shoe->draw();

        $this->assertInstanceOf(Card::class, $card);
    }

    public function testDrawReducesCardCount(): void
    {
        $shoe = new Shoe(1);
        $shoe->draw();

        $this->assertSame(51, $shoe->count());
    }

    public function testShuffleRandomizesCards(): void
    {
        $shoe1 = new Shoe(1);
        $shoe2 = new Shoe(1);
        $shoe2->shuffle();

        $cards1 = [];
        $cards2 = [];

        for ($i = 0; $i < 52; $i++) {
            $cards1[] = $shoe1->draw()->rank();
            $cards2[] = $shoe2->draw()->rank();
        }

        $this->assertNotEquals($cards1, $cards2);
    }
}
