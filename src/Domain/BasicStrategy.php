<?php

namespace App\Domain;

final class BasicStrategy
{
    public function decide(Hand $hand, Card $dealerCard): Decision
    {
        $value = $hand->value();

        if ($value >= 17) {
            return Decision::Stand;
        }

        return Decision::Hit;
    }
}