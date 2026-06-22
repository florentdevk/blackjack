<?php

namespace App\Domain;

final class BasicStrategy
{
    public function decide(Hand $hand, Card $dealerCard): Decision
    {
        $value = $hand->value();
        $dealerValue = $dealerCard->numericValue();

        if ($hand->isSoft() && $value === 18) {
            if ($dealerValue >= 3 && $dealerValue <= 6) {
                return Decision::Double;
            }
            if ($dealerValue === 2 || $dealerValue === 7 || $dealerValue === 8) {
                return Decision::Stand;
            }
            return Decision::Hit;
        }

        if ($hand->isSoft() && $value === 17) {
            if ($dealerValue >= 3 && $dealerValue <= 6) {
                return Decision::Double;
            }
            return Decision::Hit;
        }

        if ($hand->isSoft() && $value >= 15 && $value <= 16 && $dealerValue >= 4 && $dealerValue <= 6) {
            return Decision::Double;
        }

        if ($hand->isSoft() && $value >= 13 && $value <= 14 && $dealerValue >= 5 && $dealerValue <= 6) {
            return Decision::Double;
        }

        if ($value >= 17) {
            return Decision::Stand;
        }

        if (!$hand->isSoft() && $value >= 13 && $value <= 16 && $dealerValue >= 2 && $dealerValue <= 6) {
            return Decision::Stand;
        }

        if (!$hand->isSoft() && $value === 12 && $dealerValue >= 4 && $dealerValue <= 6) {
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