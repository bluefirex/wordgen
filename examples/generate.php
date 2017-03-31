#!/usr/bin/env php
<?php
	require __DIR__ . '/../vendor/autoload.php';

	use bluefirex\WordGen\Generator;

	echo 'Random:' . PHP_EOL;
	echo '-------' . PHP_EOL;

	for ($i = 0; $i < 10; $i++) {
		echo Generator::getRandomWord() . PHP_EOL;
	}

	echo PHP_EOL;

	echo 'Adjective/Noun Combinations:' . PHP_EOL;
	echo '----------------------------' . PHP_EOL;

	for ($i = 0; $i < 10; $i++) {
		echo Generator::getRandomNounWithAdjective() . PHP_EOL;
	}

	echo PHP_EOL;

	echo 'Sentences:' . PHP_EOL;
	echo '---------' . PHP_EOL;

	for ($i = 0; $i < 10; $i++) {
		echo Generator::getRandomSentence() . PHP_EOL;
	}