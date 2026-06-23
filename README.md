# Blackjack Engine

A pure PHP Blackjack engine built with strict TDD (Test-Driven Development).

## Tech Stack

- **PHP 8.5.4**
- **PHPUnit 13.2.1** (unit tests)
- **PHPStan 2.2.2** (level 6 static analysis)
- **PHP CS Fixer 3.95.10**
- **GitHub Actions** (CI/CD)

## Project Structure

```
src/Domain/
├── Card.php            # Immutable Value Object (rank, suit, numeric value)
├── Hand.php            # Hand logic (flexible Ace, Blackjack, bust, soft/pair detection)
├── Shoe.php            # Card deck (1-8 decks, shuffle, draw)
├── Dealer.php          # Dealer logic (hits until 17)
├── Decision.php        # Enum (Hit, Stand, Double, Split, Surrender)
├── BasicStrategy.php   # Complete basic strategy (hard/soft/split/surrender)
└── HiLoCounter.php     # Hi-Lo card counting system
```

## What It Covers

### Basic Strategy
Complete implementation based on the standard 4/6/8 deck chart (Dealer Stands on All 17s):

- **Hard hands** : 8 and under → Hit, 9-11 → Double/Hit, 12-16 → Stand/Hit, 17+ → Stand
- **Soft hands** : A,2 to A,9 — all correct decisions (Hit/Stand/Double)
- **Splits** : 2,2 through A,A — all correct decisions
- **Surrender** : Hard 15/16 against dealer 9/10/Ace

### Hi-Lo Card Counting
- Low cards (2-6) → **+1**
- Neutral cards (7-9) → **0**
- High cards (10/J/Q/K/A) → **-1**

## Installation

```bash
git clone https://github.com/florentdevk/blackjack.git
cd blackjack
composer install
```

## Running Tests

```bash
vendor/bin/phpunit
```

## Code Quality

```bash
# Static analysis
vendor/bin/phpstan analyse --memory-limit=512M

# Code style check
vendor/bin/php-cs-fixer fix src --dry-run
```

## TDD Approach

This project was built with strict TDD — every class was written test-first:

1. **RED** — write a failing test
2. **GREEN** — write minimal code to pass
3. **REFACTOR** — clean up without breaking tests

## Key Design Decisions

- `Card` is a **final immutable Value Object** — invalid ranks/suits throw exceptions at construction
- `Decision` is a **PHP 8.1+ enum** — type-safe, no invalid states possible
- `BasicStrategy` handles soft hands **before** hard hands to avoid rule conflicts
- `Hand::value()` automatically adjusts Ace from 11 to 1 when bust