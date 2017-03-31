<?php
	namespace bluefirex\WordGen;

	/**
	 * A generator for generating completely random but still logical
	 * english words.
	 *
	 * Thanks to http://stackoverflow.com/questions/25966526/how-can-i-generate-a-random-logical-word
	 *
	 * @package blue.firex.wordgen
	 * @author Paul Crovella, bluefirex
	 * @version 1.0
	 */
	class RandomGenerator {

		/**
		 * Get a randomly generated word that follows
		 * some basic english language rules.
		 *
		 * @return string
		 */
		public static function getRandomWord(): string {
			$lengths = self::getDistinctWordLengths();
			$bigrams = self::getWordStartBigrams();
			$trigrams = self::getTrigrams();

			do {
				$length = self::arrayWeightedRand($lengths);
				$start = self::arrayWeightedRand($bigrams);
				$word = self::fillWord($start, $length, $trigrams);
			} while (!preg_match('/[AEIOUY]/', $word));

			return strtolower($word);
		}

		/**
		 * rand()/mt_rand() for values that can be bigger than PHP_INT_MAX, hence the use
		 * of the gmp extension.
		 *
		 * @param  GMP|int $min Minimum value
		 * @param  GMP|int $max Maximum value
		 *
		 * @return GMP
		 */
		protected static function gmpRand($min, $max) {
			$max -= $min;
			$bitLength = strlen(gmp_strval($max, 2));

			do {
				$rand = gmp_init(0);

				for ($i = $bitLength - 1; $i >= 0; $i--) {
					gmp_setbit($rand, $i, rand(0, 1));

					if ($rand > $max) {
						break;
					}
				}
			} while ($rand > $max);

			return $rand + $min;
		}

		/**
		 * Get the key of a random element from an array but weighted.
		 *
		 * @param  array  $arr array
		 *
		 * @return string|int
		 */
		protected static function arrayWeightedRand(array $arr) {
			$totalWeight = gmp_init(0);

			foreach ($arr as $weight) {
				$totalWeight += $weight;
			}

			$rand = self::gmpRand(1, $totalWeight);

			foreach ($arr as $key => $weight) {
				$rand -= $weight;

				if ($rand <= 0) {
					return $key;
				}
			}
		}

		/**
		 * Fill some string to make up a word by using trigrams.
		 *
		 * @param  string $word     String to fill
		 * @param  int    $length   Length to fill up to
		 * @param  array  $trigrams Trigrams
		 *
		 * @return string
		 */
		protected static function fillWord(string $word, int $length, array $trigrams): string {
			while (strlen($word) < $length) {
				$word .= self::arrayWeightedRand($trigrams[substr($word, -2)]);
			}

			return $word;
		}

		/**
		 * Get distinct word lengths.
		 * This is a count of how many english words there are with a given length, 0-based.
		 *
		 * @return array
		 */
		protected static function getDistinctWordLengths(): array {
			return json_decode(file_get_contents(__DIR__ . '/resources/distinct_word_lengths.json'), true);
		}

		/**
		 * Get the word start bigrams.
		 *
		 * @return array
		 */
		protected static function getWordStartBigrams(): array {
			return json_decode(file_get_contents(__DIR__ . '/resources/word_start_bigrams.json'), true);
		}

		/**
		 * Get the trigrams.
		 *
		 * @return array
		 */
		protected static function getTrigrams(): array {
			return json_decode(file_get_contents(__DIR__ . '/resources/trigrams.json'), true);
		}
	}