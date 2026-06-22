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

        if ($value >= 13 && $value <= 16 && $dealerValue >= 2 && $dealerValue <= 6) {
            return Decision::Stand;
        }

        if ($value === 12 && $dealerValue >= 4 && $dealerValue <= 6) {
            return Decision::Stand;
        }

        if ($value === 11 && $dealerValue >= 2 && $dealerValue <= 10) {
            return Decision::Double;
        }

        if ($value === 10 && $dealerValue >= 2 && $dealerValue <= 9) {
            return Decision::Double;
        }

        if ($value === 9 && $dealerValue >= 3 && $dealerValue <= 6) {
            return Decision::Double;
        }

        return Decision::Hit;
    }
}