# WordGen

This is a very primitive library for generating english words and basic sentences. You can use it for a variety of things, such as creating an ID that is readable like an english word or creating memorable passwords.

## Installation

`composer require bluefirex/wordgen`

## Usage

```php
<?php
    require __DIR__ . '/vendor/autoload.php';

    use bluefirex\WordGen\Generator;

    $randomWord = Generator::getRandomWord();
    $randomNounWithAdjective = Generator::getRandomNounWithAdjective($delimiter = ' ');
    $randomAdjective = Generator::getRandomAdjective();
    $randomNoun = Generator::getRandomNoun();
    $randomVerb = Generator::getRandomVerb();
    $randomSentence = Generator::getRandomSentence();
```

## Contributions

- Word Lengths, Bigrams and Trigrams by [pcrov/Wordle](https://github.com/pcrov/Wordle)
- Dictionary by [kohsuke/wordnet-random-name](https://github.com/kohsuke/wordnet-random-name)