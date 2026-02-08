<?php

namespace Dobine\Utils;

use Symfony\Component\String\{Slugger\AsciiSlugger, UnicodeString};

class Strings {
	/**
	 * Converts a given string into a camelCase identifier.
	 *
	 * @param string $string The input string to be converted into a camelCase identifier.
	 * @return string The resulting camelCase identifier.
	 */
	public static function identify(string $string): string {
		$unicodeString = new UnicodeString($string);
		return $unicodeString->trim()
			->camel()
			->ascii()
			->toString();
	}
	
	/**
	 * Converts a given string into a URL-friendly slug format.
	 *
	 * This method processes the input string by first removing a leading slash, if present.
	 * Then, it splits the string into segments based on the '/' delimiter. Each segment is
	 * processed through the ASCII slugger to convert it into a lowercased, trimmed, and slugified form.
	 * Finally, the processed segments are joined together using '/' as the separator.
	 *
	 * @param string $string The input string to be converted into a slug.
	 * @return string The resulting slugified string.
	 */
	public static function slugify(string $string): string {
		$slugger = new AsciiSlugger();
		if(!empty($string) and $string[0] === "/") {
			$string = substr($string, 1);
		}
		
		$segments = array_map(fn(string $part) => $slugger->slug($part)
			->lower()
			->trim()
			->toString(), explode("/", $string));
		
		return implode("/", $segments);
	}
}
