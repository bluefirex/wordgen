<?php
	namespace bluefirex\WordGen;

	/**
	 * A generator for generating sentences from a dictionary of
	 * words in the English language.
	 *
	 * @package blue.firex.wordgen
	 * @author bluefirex
	 * @version 1.0
	 */
	class DictionaryGenerator {
		protected static $adjectives;
		protected static $nouns;
		protected static $verbs;

		/**
		 * Get a random english adjective
		 *
		 * @return string
		 */
		public static function getRandomAdjective(): string {
			return trim(self::getAdjectives()[array_rand(self::getAdjectives(), 1)]);
		}

		/**
		 * Get a random english noun
		 *
		 * @return string
		 */
		public static function getRandomNoun(): string {
			return trim(self::getNouns()[array_rand(self::getNouns(), 1)]);
		}

		/**
		 * Get a random english verb
		 *
		 * @return string
		 */
		public static function getRandomVerb(): string {
			return trim(self::getVerbs()[array_rand(self::getVerbs(), 1)]);
		}

		/**
		 * Get a random noun with an adjective preceeding it
		 *
		 * @param string $delimiter Delimiter between the words
		 *
		 * @return string
		 */
		public static function getRandomNounWithAdjective(string $delimiter = ' '): string {
			return self::getRandomAdjective() . $delimiter . self::getRandomNoun();
		}

		/**
		 * Get a random sentence describing what something does with something.
		 *
		 * @return string
		 */
		public static function getRandomSentence(): string {
			return implode(' ', [
				'the',
				self::getRandomAdjective(),
				self::getRandomNoun(),
				self::getRandomVerb() . 's',
				'the',
				self::getRandomAdjective(),
				self::getRandomNoun()
			]);
		}

		/**
		 * Get a list of adjectives
		 *
		 * @return array
		 */
		protected static function getAdjectives(): array {
			if (!self::$adjectives) {
				self::$adjectives = file(__DIR__ . '/resources/adjectives.txt');
			}

			return self::$adjectives;
		}

		/**
		 * Get a list of nouns
		 *
		 * @return array
		 */
		protected static function getNouns(): array {
			if (!self::$nouns) {
				self::$nouns = file(__DIR__ . '/resources/nouns.txt');
			}

			return self::$nouns;
		}

		/**
		 * Get a list of verbs
		 *
		 * @return array
		 */
		protected static function getVerbs(): array {
			if (!self::$verbs) {
				self::$verbs = file(__DIR__ . '/resources/verbs.txt');
			}

			return self::$verbs;
		}
	}