<?php
/*
Plugin Name: List Shortcode
Plugin URI: https://0xcrypto.github.io
Description: Lists shortcodes available. 
Version: 0.1
Author: Vikrant 
Author URI: https://0xcrypto.github.io
*/

if(is_admin()) {
	$shortCodes = new view_list_shortcodes();
}

class view_list_shortcodes {

	public function __construct()
	{
		$this->admin();
	}

	public function admin_page(){
		global $shortcode_tags;

        ?>
        <div>
			<h2>List of Available Shortcodes</h2>
			<div>
        	<table>
        <?php

	        foreach($shortcode_tags as $code => $function)
	        {
	        	?>
	        		<tr><td>[<?php echo $code; ?>]</td></tr>
	        	<?php
	        }
	    ?>

			</table>
			</div>
		</div>
		<?php
	}

	public function admin(){
		add_action( 'admin_menu', array(&$this,'admin_menu') );
	}

	public function admin_menu(){
		add_submenu_page(
			'options-general.php',
			'List All Shortcodes',
			'List All Shortcodes',
			'manage_options',
			'list-all-shortcodes',
			array(&$this,'admin_page'));
	}
}
?>
