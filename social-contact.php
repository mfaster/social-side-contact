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
  if( is_single() ) {
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
}

/**
 * Enqueue css and javascript for confirmation payment page.
 * CSS for feel good.
 * javascript for validate data.
 */
add_action( 'wp_enqueue_scripts', 'social_side_contact_scripts' );

function seed_confirm_scripts() {
	if(!is_admin()) {
		wp_enqueue_style( 'social_side_contact', plugin_dir_url( __FILE__ ) . 'social_side_contact.css' , array() );
	}
}