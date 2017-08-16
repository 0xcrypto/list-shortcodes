<?php

/**
 * List all available shortcodes.
 *
 * Plugin Name: List shortcodes
 * Plugin URI:  https://github.com/0xcrypto/list-shortcodes
 * Description: List all available shortcodes.
 * Version:     0.0.1
 * Author:      Vikrant, Originally by Paul Underwood
 * Author URI:  http://github.com/0xcrypto
 * License: 	GNU GPLv2.0
 *
 */

/**
 * Copyright (c) 2012 Paul Underwood. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
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

function admin_page() {
	global $shortcode_tags;
	echo '<div><h2>Total Shortcodes: '. count($shortcode_tags).' </h2>';
	echo '<div><table>';
	echo '<th>SHORTCODE</th><th>FUNCTION</th>';

	foreach($shortcode_tags as $code => $function) {
		echo '<tr><td>' . $code . '</td>';
		echo '<td>' . $function . '</td></tr>';
  } echo '</table></div></div>';
}


function listShortcodesAdmin() {
	add_submenu_page(
		'options-general.php',
		'List All Shortcodes',
		'List All Shortcodes',
		'manage_options',
		'list-all-shortcodes',
		'admin_page'
	);
}

if( defined('WP_CLI') ) WP_CLI::add_command('shortcode list', 'listShortcodes');
elseif( defined('ABSPATH') ) add_action( 'admin_menu', 'listShortcodesAdmin' );
else return;
