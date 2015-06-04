<?php
	/**
		* Plugin Name: WP TagMan
		* Plugin URI: http://adamainsworth.me/projects/wp-tagman/
		* Description: Allows you to place Google Tag Manager into your Wordpress Site
		* Version: 0.1
		* Author: Mesklin Net Technologies
		* Author URI: http://mesklin.net/
		* License: GPL2
	*/

	register_activation_hook( __FILE__,'wp_tagman_install' ); 
	function wp_tagman_install() {
		add_option("wp_tagman_gtm_code", 'Default', '', 'yes');
	}

	register_deactivation_hook( __FILE__, 'wp_tagman_remove' );
	function wp_tagman_remove() {
		delete_option('wp_tagman_gtm_code');
	}

	add_action('wp_footer','wp_tagman');
	function wp_tagman() {
		$gtm_code = get_option('wp_tagman_gtm_code');

		// don't fire if user logged
		// also, forget about it if there's go GTM
		if( $gtm_code && !is_user_logged_in() ) : ?>
			<!-- Google Tag Manager -->
				<noscript><iframe src="//www.googletagmanager.com/ns.html?id=<?php echo( $gtm_code ); ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
				<script id="wp-tagman-script">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','<?php echo( $gtm_code ); ?>');</script>
				<script>jQuery('body').prepend( jQuery('#wp-tagman-script') );</script>
			<!-- End Google Tag Manager -->
		<?php endif;
	}

	add_action('admin_menu', 'wp_tagman_admin_menu');
	function wp_tagman_admin_menu() {
		if ( is_admin() ){
			add_options_page('WP TagMan', 'WP TagMan', 'administrator', 'wp-tagman', 'wp_tagman_html_page');
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'wp_tagman_scripts' );
	function wp_tagman_scripts() {
		wp_enqueue_script('jquery');
	}

	function wp_tagman_html_page(){
		if ( is_admin() ) : ?>
			<h2>WP TagMan</h2>
			<p>From <a href="http://mesklin.net/" target="_blank">Mesklin Net Technologies</a></p>

			<p>You must enter the code you were given by GTM to enable the plugin to function properly.</p>

			<form method="post" action="options.php">
				<?php wp_nonce_field('update-options'); ?>

				<table class="form-table">
					<tbody>
						<tr>
							<th><label for="wp_tagman_gtm_code">Google Tag Manager code</label></th>
							<td><input name="wp_tagman_gtm_code" id="gtm_code" type="text" value="<?php echo( get_option('wp_tagman_gtm_code') ); ?>" class="regular-text code"></td>
						</tr>
					</tbody>
				</table>

				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="wp_tagman_gtm_code" />

				<input type="submit" value="<?php _e('Save Changes') ?>" />
			</form>
			
			<p>More functionality will follow in future versions :-)</p>
		<?php endif;
	}
?>