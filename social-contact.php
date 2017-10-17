<?php
/**
 * Plugin Name: Social Side Contact
 * Plugin URI: https://mfaster.com
 * Description: This plugin adds social contract on page ,to let customer easy to contact you guys
 * Version: 1.0.0
 * Author: Q_Q
 * Author URI: https://mfaster.com
 * License: GPL2
 */

add_action( 'wp_head', 'social_side_contact' );
function social_side_contact() {
  ?>

    <ul id="social_side_links">
      <li>
        <a class="facebook-icon" href="https://www.facebook.com/mfasterpro" target="_blank"><img src="https://mfaster.com/wp-content/uploads/2017/10/facebook-icon.png"></a>
      </li><li>
        <a class="messenger-icon" href="http://m.me/mfasterpro" target="_blank"><img src="https://mfaster.com/wp-content/uploads/2017/10/Messenger_Icon.png"></a>
      </li><li>
        <a class="line-icon" href="https://line.me/ti/p/~0890078800" target="_blank"><img src="https://mfaster.com/wp-content/uploads/2017/10/LINE_Icon.png"></a>
      </li><li>
        <a class="phone-icon" href="tel:+0890078800"><img src="https://mfaster.com/wp-content/uploads/2017/10/phoneicon.png"></a>
      </li>
    </ul>
    
  <?php
}

/**
 * Enqueue css and javascript for confirmation payment page.
 * CSS for feel good.
 * javascript for validate data.
 */
add_action( 'wp_enqueue_scripts', 'social_side_contact_scripts' );

function social_side_contact_scripts() {
	if(!is_admin()) {
		wp_enqueue_style( 'social_side_contact', plugin_dir_url( __FILE__ ) . 'social_side_contact.css' , array() );
	}
}

add_action('admin_menu', 'social_side_contact_menu');

function social_side_contact_menu() {
	add_menu_page('Social Side Contact Settings', 'Social Side', 'administrator', 'social-side-contact-settings', 'social_side_contact_settings_page', 'dashicons-facebook');
}

add_action( 'admin_init', 'social_side_contact_settings' );

function social_side_contact_settings() {
	register_setting( 'social-side-contact-settings-group', 'accountant_name' );
	register_setting( 'social-side-contact-settings-group', 'accountant_phone' );
	register_setting( 'social-side-contact-settings-group', 'accountant_email' );
}

function social_side_contact_settings_page() {
    ?>
    <div class="wrap">
    <h2>Contact Detail</h2>
    
    <form method="post" action="options.php">
        <?php settings_fields( 'social-side-contact-settings-group' ); ?>
        <?php do_settings_sections( 'social-side-contact-settings-group' ); ?>
        <table class="form-table">
            <tr valign="top">
            <th scope="row">Facebook page</th>
            <td><input type="text" name="facebook-page" value="<?php echo esc_attr( get_option('fbp') ); ?>" /></td>
            </tr>
             
            <tr valign="top">
            <th scope="row">Facebook Message</th>
            <td><input type="text" name="facebook-message" value="<?php echo esc_attr( get_option('fbm') ); ?>" /></td>
            </tr>
            
            <tr valign="top">
            <th scope="row">Line</th>
            <td><input type="text" name="line" value="<?php echo esc_attr( get_option('line') ); ?>" /></td>
            </tr>

            <tr valign="top">
            <th scope="row">Phone Number</th>
            <td><input type="text" name="phonenumber" value="<?php echo esc_attr( get_option('phone') ); ?>" /></td>
            </tr>
        </table>
        
        <?php submit_button(); ?>
    
    </form>
    </div>
    <?php
}

