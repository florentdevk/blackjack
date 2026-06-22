<?php

namespace App\Domain;

enum Decision
{
    case Hit;
    case Stand;
    case Double;
    case Split;
}