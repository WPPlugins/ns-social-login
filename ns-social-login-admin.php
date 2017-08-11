<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function ns_social_login_options_group() {
    register_setting('ns_social_login_free_options', 'ns_social_login_fb_code');
}
 
add_action ('admin_init', 'ns_social_login_options_group');



function ns_social_login_update_options_form() {

    ?>
       <div class="wrap">
        <div class="icon32" id="icon-options-general"><br /></div>
        <h2>NS Social Login settings</h2>
        <p>&nbsp;</p>
        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php settings_fields('ns_social_login_free_options'); ?>
            <table class="form-table">
                <tbody>
					<tr valign="top">
						<th class="titledesc" scope="row">
							<label for="ns_social_login_fb_code">Facebook code</label>
						</th>
                        <td class="forminp">
                            <?php //wp_editor( get_option('ns_social_login_fb_code'), 'ns_social_login_fb_code', $settings = array('textarea_name'=>'ns_social_login_fb_code') ); ?>
							<textarea id="ns_social_login_fb_code" name="ns_social_login_fb_code"><?php echo get_option('ns_social_login_fb_code'); ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
			<p class="submit">
				<input type="submit" class="button-primary" id="submit" name="submit" value="<?php _e('Save Changes'); ?>" />
			</p>
        </form>
    </div>
    <?php
}

?>