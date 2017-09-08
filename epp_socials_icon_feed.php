<?php
/*
Plugin Name: EPP SOCIALS PLUGIN
Plugin URI:  https://github.com/epp2k12/test_tech.git
Description: Simple Social Icons and Feeds Plugin. This is a Tech Test for my application as a web developer for Create_IT.
Version:     1.1
Author:      Erwinsky Presbitero
Author URI:  https://bawing.wordpress.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wporg
Domain Path: /languages
*/

// Load the Theme JS

define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__.'/includes/epp_socials_simple.php');
require_once(__ROOT__.'/shortcodes/social_icons_shortcodes.php');

//load scripts and stylesheets to admin pages
function my_admin_scripts() {
    wp_enqueue_script( 'jquery_script', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array( 'jquery' ), true );
    wp_enqueue_script( 'my-great-script', plugin_dir_url( __FILE__ ) . 'assets/js/social_icons.js', array( 'jquery' ), true );
    wp_enqueue_style('social_icon_style_admin',plugin_dir_url( __FILE__ ) . 'assets/css/style_icons.css');
}
add_action( 'admin_enqueue_scripts', 'my_admin_scripts' );

// load css into the website's front-end
function mytheme_enqueue_style() {
	wp_enqueue_style('social_icon_style',plugin_dir_url( __FILE__ ) . 'assets/css/style_icons.css');
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_style' );

//loading the shortcode logic
add_shortcode('ct_socials', 'epp_social_icons_shortcode');

//generate the main admin panel
new Epp_Socials_Simple();

