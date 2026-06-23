<?php

namespace App\Domain;

final class HiLoCounter
{
    private int $count = 0;

    public function count(Card $card): void
    {
        $this->count++;
    }

    public function runningCount(): int
    {
        return $this->count;
    }
}