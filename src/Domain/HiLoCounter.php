<?php

namespace App\Domain;

final class HiLoCounter
{
    private int $count = 0;

    public function count(Card $card): void
    {
        $value = $card->numericValue();

        if ($value >= 2 && $value <= 6) {
            $this->count++;
        } elseif ($value >= 10) {
            $this->count--;
        }
    }

    public function runningCount(): int
    {
        return $this->count;
    }
}