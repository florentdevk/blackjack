<?php

namespace App\Domain;

final class BasicStrategy
{
    public function decide(Hand $hand, Card $dealerCard): Decision
    {
        return Decision::Hit;
    }
}