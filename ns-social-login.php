<?php
/*
Plugin Name: NS Social login
Plugin URI: http://www.nsthemes.com/
Description: Use your facebook login to create a account on your site
Version: 1.1.0
Author: NsThemes
Author URI: http://nsthemes.com
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* *** include admin option *** */
require_once( plugin_dir_path(__FILE__).'/ns-social-login-admin.php');

function ns_social_login_free_add_option_page() {
    add_menu_page('Social Login', 'Social Login', 'manage_options', 'ns-social-login-free', 'ns_social_login_update_options_form', plugin_dir_url( __FILE__ ).'/img/backend-sidebar-icon.png', 60);
}
 
add_action('admin_menu', 'ns_social_login_free_add_option_page');

function ns_social_login_default_options() {
    add_option('ns_social_login_fb_code', '');
}
 
register_activation_hook( __FILE__, 'ns_social_login_default_options');

add_action( 'login_head', 'ns_add_login_head' );

function ns_add_login_head() {
// 360513984292291
    ?>

	<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '<?php echo get_option('ns_social_login_fb_code'); ?>',
      xfbml      : true,
      version    : 'v2.8'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v2.8&appId=<?php echo get_option('ns_social_login_fb_code'); ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



    <?php

}


add_action( 'login_form', 'ns_add_login_body' );

function ns_add_login_body() {
	?>
	<div style="width: 100%; float: left;">
		<div id="fb-root"></div>
		
		<div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false"></div>
	</div>
	<?php
}

?>
