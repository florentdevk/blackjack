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
}