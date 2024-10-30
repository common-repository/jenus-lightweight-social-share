<?php
   /*
   Plugin Name: Jenus Lightweight Social Share
   Plugin URI: http://jenusitsolutions.com/social-share/
   Description: A basic and fast social share plugin
   Version: 1.3.3
   Author: Jenus Web Solutions Inc.
   Author URI: http://jenusitsolutions.com
   License: GPL2
   */



/**
 * The main class that handles the entire output, content filters, etc., for this plugin.
 *
 * @package Jenus Lightweight Social Share
 * @since 1.0
 */
class jenus_LSS_social_share {


	/** Constructor */
	function __construct() {

		register_activation_hook( __FILE__, array( $this, 'activation_hook' ) );
		
		wp_enqueue_style( 'jenus-lightweight-social-share-style', plugins_url( '/assets/style.css', __FILE__  ) );
		wp_enqueue_style( 'load-font-awesome', plugins_url( '/assets/font-awesome-4.7.0/css/font-awesome.min.css' , __FILE__ ) );
		wp_enqueue_script( 'jenus-social-share-script', plugins_url('/assets/jenus-social-share-script.js', __FILE__ ), array(), '1.0.0', true );
		
		add_action('genesis_entry_content', array( $this, 'add_jenus_lss_social_share' ),1);
	}


	function activation_hook() {

		if ( ! defined( 'PARENT_THEME_VERSION' ) || ! version_compare( PARENT_THEME_VERSION, '2.1.0', '>=' ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ) ); /** Deactivate ourself */
			wp_die( sprintf( __( 'Sorry, you cannot activate without <a href="%s">Genesis %s</a> or greater', 'genesis-simple-edits' ), 'http://my.studiopress.com/?download_id=91046d629e74d525b3f2978e404e7ffa', '2.1.0' ) );
		}

	}

	/*create basic social share*/
	function add_jenus_lss_social_share(){
		global $post;
		$postID = $post->ID;
		$url = get_permalink();
		$title = wp_get_document_title();
		if(is_single()){
			echo "<div class='jenus-social-share jenus-theme-5 clearfix'>
			<div class='jenus-facebook jenus-single-icon'>
				<a href='//www.facebook.com/sharer/sharer.php?u=".$url."' target='_blank' title='Share on Facebook'>
				<div class='jenus-icon-block clearfix'>
					<i class='fa fa-facebook'></i>
				</div></a>
			</div>
			<div class='jenus-twitter jenus-single-icon'>
				<a href='//twitter.com/intent/tweet?text=". $title . "&amp;url=".$url."&amp;via=foxxrinc' target='_blank' title='Share on Twitter'>
				<div class='jenus-icon-block clearfix'>
					<i class='fa fa-twitter'></i>
				</div></a>
			</div>
			<div class='jenus-google-plus jenus-single-icon'>
				<a href='//plus.google.com/share?url=" . $url . "' target='_blank' title='Share on Google Plus'>
				<div class='jenus-icon-block clearfix'>
					<i class='fa fa-google-plus'></i>
				</div></a>
			</div>
			<div class='jenus-pinterest jenus-single-icon'>
				<a href='//pinterest.com/pin/create/button/?url=" . $url ."&media=" . get_the_post_thumbnail_url() .  "&description=" . get_the_excerpt().  "' title='Share on Pinterest' target='blank'>
				<div class='jenus-icon-block clearfix'>
					<i class='fa fa-pinterest'></i>
				</div></a>
			</div>
			<div class='jenus-linkedin jenus-single-icon'>
				<a href='//www.linkedin.com/shareArticle?mini=true&amp;title=" . $title . "&amp;url=". $url ."&amp;summary=". get_the_excerpt() ."' target='_blank' title='Share on LinkedIn'>
				<div class='jenus-icon-block clearfix'>
					<i class='fa fa-linkedin'></i>
				</div></a>
			</div>
			<div class='jenus-email jenus-single-icon'>
				<a class='share-email-popup' href='mailto:?subject=Please%20visit%20this%20link%20" . $url . "&amp;body=I%20found%20this%20interesting%20article:%20&quot;" . $title . "&quot;.%20Here%20is%20the%20website%20link:%20". $url . ".' target='_blank' title='Share it on Email'>
				<div class='jenus-icon-block clearfix'>
					<i class='fa fa-envelope'></i>
				</div></a>
			</div>
		</div>";
	 	}
	}
}
	
	


$jenus_LSS_social_share = new jenus_LSS_social_share;