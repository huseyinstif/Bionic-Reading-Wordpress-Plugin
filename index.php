<?php
/**
 * Plugin Name: Bionic Reading
 * Plugin URI: https://github.com/huseyinstif
 * Description: This plugin applies the Bionic Reading format to all blog posts on your site.
 * Version: 1.0
 * Author: Huseyin Tintas
 * Author URI: https://github.com/huseyinstif
 * License: GPL2
 */

 function bionic_reading_format_posts($content) {
  // Only apply the Bionic Reading format to single post pages
  if (is_single()) {
    // Split the content into an array of words
    $words = explode(' ', $content);

    // Apply the Bionic Reading format to each word
    $formatted_words = array_map(function($word) {
      return "<b>" . mb_substr($word, 0, round(mb_strlen($word) / 2)) . "</b>" . mb_substr($word, round(mb_strlen($word) / 2), mb_strlen($word));
    }, $words);

    // Join the formatted words back into a single string
    return implode(' ', $formatted_words);
  } else {
    // Return the content as-is for other pages
    return $content;
  }
}

add_filter('the_content', 'bionic_reading_format_posts');

