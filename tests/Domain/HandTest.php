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
}