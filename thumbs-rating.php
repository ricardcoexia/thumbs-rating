<?php
/*
Plugin Name: Thumbs Rating
Plugin URI: http://php.quicoto.com/
Description: Add thumbs up/down rating to your content.
Author: Ricard Torres
Version: 0.1
Author URI: http://php.quicoto.com/
*/

/*-----------------------------------------------------------------------------------*/
/* Define the URL and DIR path */
/*-----------------------------------------------------------------------------------*/

define('thumbs_rating_url', WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) );
define('thumbs_rating_path', WP_PLUGIN_DIR."/".dirname( plugin_basename( __FILE__ ) ) );


/*-----------------------------------------------------------------------------------*/
/* Init */
/* Localization */
/*-----------------------------------------------------------------------------------*/

function thumbs_rating_init() {

	load_plugin_textdomain( 'thumbs-rating', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action('plugins_loaded', 'thumbs_rating_init');


/*-----------------------------------------------------------------------------------*/
/* Encue the Scripts for the Ajax call */
/*-----------------------------------------------------------------------------------*/

function thumbs_rating_scripts()
{
	wp_enqueue_script('thumbs_rating_scripts', thumbs_rating_url . '/js/general.js', array('jquery'));
	wp_localize_script( 'thumbs_rating_scripts', 'thumbs_rating_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action('wp_enqueue_scripts', thumbs_rating_scripts);


/*-----------------------------------------------------------------------------------*/
/* Encue the Styles for the Thumbs up/down */
/*-----------------------------------------------------------------------------------*/

function thumbs_rating_styles()  
{ 
   
    wp_register_style( "thumbs_rating_styles",  thumbs_rating_url . '/css/style.css' , "", "1.0.0");
    wp_enqueue_style( 'thumbs_rating_styles' );
}
add_action('wp_enqueue_scripts', 'thumbs_rating_styles');	


/*-----------------------------------------------------------------------------------*/
/* Add the thumbs up/down links to the content */
/*-----------------------------------------------------------------------------------*/

function thumbs_rating_getlink()
{
	$thumbs_rating_link = "";
	$post_ID = get_the_ID();
	$thumbs_rating_up_count = get_post_meta($post_ID, '_thumbs_rating_up', true) != '' ? get_post_meta($post_ID, '_thumbs_rating_up', true) : '0';
	$thumbs_rating_down_count = get_post_meta($post_ID, '_thumbs_rating_down', true) != '' ? get_post_meta($post_ID, '_thumbs_rating_down', true) : '0';
	$link_up = ' <a class="thumbs-rating-up" onclick="thumbs_rating_vote(' . $post_ID . ', 1);">' . __('Vote Up','thumbs-rating') . '</a> ' . $thumbs_rating_up_count;
	 $link_down = '<a class="thumbs-rating-down" onclick="thumbs_rating_vote(' . $post_ID . ', 0);">' . __('Vote Down','thumbs-rating') . '</a> ' . $thumbs_rating_down_count;
	$thumbs_rating_link = '<div  class="thumbs-rating-container" id="thumbs-rating-'.$post_ID.'">';
	$thumbs_rating_link .= '<span>'.$link_up.'</span>';
	$thumbs_rating_link .= ' - ';
	$thumbs_rating_link .= '<span>'.$link_down.'</span>';
	$thumbs_rating_link .= '</div>';
	
	return $thumbs_rating_link;
}
function thumbs_rating_printlink($content)
{
	return $content.thumbs_rating_getlink();
}
add_filter('the_content', thumbs_rating_printlink);


/*-----------------------------------------------------------------------------------*/
/* Handle the Ajax request to vote */
/*-----------------------------------------------------------------------------------*/

function thumbs_rating_add_vote()
{
	$results = '';
	global $wpdb;
	$post_ID = intval( $_POST['postid'] );
	$type_of_vote = intval( $_POST['type'] );
	$thumbs_rating_up_count = get_post_meta($post_ID, '_thumbs_rating_up', true) != '' ? get_post_meta($post_ID, '_thumbs_rating_up', true) : '0';
	$thumbs_rating_down_count = get_post_meta($post_ID, '_thumbs_rating_down', true) != '' ? get_post_meta($post_ID, '_thumbs_rating_down', true) : '0';
	
	
	
	$votemecountNew = $votemecount + 1;
	update_post_meta($post_ID, '_votemecount', $votemecountNew);
	$results.='<div class="votescore" >'.$votemecountNew.'</div>';
	// Return the String
	die($results);
}
		// creating Ajax call for WordPress
		add_action( 'wp_ajax_nopriv_voteme_addvote', 'voteme_addvote' );
		add_action( 'wp_ajax_voteme_addvote', 'voteme_addvote' );
