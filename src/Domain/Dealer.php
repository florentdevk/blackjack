<?php

namespace App\Domain;

final class Dealer
{
    public function play(Hand $hand, Shoe $shoe): void
    {
        while ($hand->value() < 17) {
            $hand->addCard($shoe->draw());
        }
    }
}
