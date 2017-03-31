<?php
	namespace bluefirex\WordGen;

	/**
	 * Facade for bundling all the generator functions used for public access.
	 *
	 * @package blue.firex.wordgen
	 * @version 1.0
	 * @author bluefirex
	 */
	class Generator {

		/**
		 * Get a randomly generated word that follows
		 * some basic english language rules.
		 *
		 * @return string
		 */
		public static function getRandomWord(): string {
			return RandomGenerator::getRandomWord();
		}

		/**
		 * Get a random noun with an adjective preceeding it
		 *
		 * @param string $delimiter Delimiter between the words
		 *
		 * @return string
		 */
		public static function getRandomNounWithAdjective(string $delimiter = ' ') {
			return DictionaryGenerator::getRandomNounWithAdjective($delimiter);
		}

		/**
		 * Get a random english adjective
		 *
		 * @return string
		 */
		public static function getRandomAdjective() {
			return DictionaryGenerator::getRandomAdjective();
		}

		/**
		 * Get a random english noun
		 *
		 * @return string
		 */
		public static function getRandomNoun() {
			return DictionaryGenerator::getRandomNoun();
		}

		/**
		 * Get a random english verb
		 *
		 * @return string
		 */
		public static function getRandomVerb() {
			return DictionaryGenerator::getRandomVerb();
		}

		/**
		 * Get a random sentence describing what something does with something.
		 *
		 * @return string
		 */
		public static function getRandomSentence() {
			return DictionaryGenerator::getRandomSentence();
		}
	}