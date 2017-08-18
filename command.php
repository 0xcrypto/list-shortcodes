<?php

if ( ! class_exists( 'WP_CLI' ) ) {
	return;
}

/**
 * Shows a list of available shortcodes.
 *
 * @when after_wp_load
 */

function listShortcodes() {
	global $shortcode_tags;
	$mask = "    %-10.20s   %-30.30s\n";
	echo 'Total Shortcodes: ' . count($shortcode_tags) . "\n";

	printf("\033[1m".$mask, 'SHORTCODE', "FUNCTION\033[0m");

	foreach($shortcode_tags as $code => $function ) {
		printf($mask, $code, $function);
	}
}

WP_CLI::add_command('shortcode list', 'listShortcodes');
