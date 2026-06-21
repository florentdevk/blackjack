<?php

namespace App\Tests\Domain;

use App\Domain\Card;
use PHPUnit\Framework\TestCase;

final class CardTest extends TestCase
{
    public function testCardHasNumericValue(): void
    {
        $card = new Card('7', 'Hearts');

        $this->assertSame(7, $card->numericValue());
    }
}