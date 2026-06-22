<?php

namespace App\Domain;

final class BasicStrategy
{
    public function decide(Hand $hand, Card $dealerCard): Decision
    {
        $value = $hand->value();
        $dealerValue = $dealerCard->numericValue();

        if ($value >= 17) {
            return Decision::Stand;
        }

        if ($value >= 12 && $value <= 16 && $dealerValue >= 4 && $dealerValue <= 6) {
            return Decision::Stand;
        }

        return Decision::Hit;
    }
}