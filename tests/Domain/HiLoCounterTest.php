<?php

namespace App\Tests\Domain;

use App\Domain\Card;
use App\Domain\HiLoCounter;
use PHPUnit\Framework\TestCase;

final class HiLoCounterTest extends TestCase
{
    public function testLowCardIncrementsCount(): void
    {
        $counter = new HiLoCounter();
        $counter->count(new Card('5', 'Hearts'));

        $this->assertSame(1, $counter->runningCount());
    }

    public function testNeutralCardDoesNotChangeCount(): void
    {
        $counter = new HiLoCounter();
        $counter->count(new Card('7', 'Hearts'));

        $this->assertSame(0, $counter->runningCount());
    }
}