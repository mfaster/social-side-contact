<?php
/**
 * Plugin Name: Social Side Contact
 * Plugin URI: https://github.com/mfaster/social-side-contact
 * Description: This plugin adds social contract on page ,to let user easy to contact you guys
 * Version: 1.0.9
 * Author: Q_Q
 * Author URI: https://github.com/mfaster
 * Text Domain: social-side-contact
 * License: GPL2
 */



/**
 * Enqueue css and javascript for page.
 * CSS for feel good.
 * javascript for validate data.
 */
add_action( 'wp_enqueue_scripts', 'social_side_contact_scripts' );

function social_side_contact_scripts() {
	if(!is_admin()) {
		wp_enqueue_style( 'social_side_contact', plugin_dir_url( __FILE__ ) . 'social_side_contact.css' , array() );
	}
}
// create custom plugin settings menu
add_action('admin_menu', 'social_side_contact_menu');

function social_side_contact_menu() {
  //create new top-level menu
  add_menu_page('Social Side Contact Settings', 'Social Side', 'administrator', 'social-side-contact-settings', 'social_side_contact_settings_page', 'dashicons-facebook');
  
  //call register settings function
  add_action( 'admin_init', 'social_side_contact_settings' );
  
}

add_action( 'admin_init', 'social_side_contact_settings' );

function social_side_contact_settings() {
	register_setting( 'social-side-contact-settings-group', 'fbp' );
	register_setting( 'social-side-contact-settings-group', 'fbm' );
  register_setting( 'social-side-contact-settings-group', 'line' );
  register_setting( 'social-side-contact-settings-group', 'phone' );
  register_setting( 'social-side-contact-settings-group', 'mail' );
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
            <td><input type="text" name="fbp" value="<?php echo esc_attr( get_option('fbp') ); ?>" /></td>
            </tr>
             
            <tr valign="top">
            <th scope="row">Facebook Messager</th>
            <td><input type="text" name="fbm" value="<?php echo esc_attr( get_option('fbm') ); ?>" /></td>
            </tr>
            
            <tr valign="top">
            <th scope="row">Line</th>
            <td><input type="text" name="line" value="<?php echo esc_attr( get_option('line') ); ?>" /></td>
            </tr>

            <tr valign="top">
            <th scope="row">E-mail</th>
            <td><input type="text" name="mail" value="<?php echo esc_attr( get_option('mail') ); ?>" /></td>
            </tr>

            <tr valign="top">
            <th scope="row">Phone Number</th>
            <td><input type="text" name="phone" value="<?php echo esc_attr( get_option('phone') ); ?>" /></td>
            </tr>

        </table>
        
        <?php submit_button(); ?>
    
    </form>
    </div>
    <?php
}




add_action( 'wp_head', 'social_side_contact' );
function social_side_contact() {

  ?>

    <ul id="social_side_links">
      <li>
        <a class="facebook-icon" <?php echo 'href="'. get_option( 'fbp' ) . '" ';?> target="_blank"><?php echo '<img src="' . plugins_url( 'images/facebook-icon.png', __FILE__ ) . '" > ';?></a>
      </li><li>
        <a class="messenger-icon" <?php echo 'href="'. get_option( 'fbm' ) . '" ';?> target="_blank"><?php echo '<img src="' . plugins_url( 'images/Messenger_Icon.png', __FILE__ ) . '" > ';?></a>
      </li><li>
        <a class="line-icon" <?php echo 'href="'. get_option( 'line' ) . '" ';?> target="_blank"><?php echo '<img src="' . plugins_url( 'images/LINE_Icon.png', __FILE__ ) . '" > ';?></a>
      </li><li>
        <a class="email-icon" <?php echo 'href="mailto:'. get_option( 'mail' ) . '" > ';?> <?php echo '<img src="' . plugins_url( 'images/emailIcon.png', __FILE__ ) . '" > ';?></a>
      </li><li>
        <a class="phone-icon" <?php echo 'href="tel:+'. get_option( 'phone' ) . '" > ';?> <?php echo '<img src="' . plugins_url( 'images/phoneicon.png', __FILE__ ) . '" > ';?></a>
      </li>
      
    </ul>
    
  <?php
}
