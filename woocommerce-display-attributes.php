<?php
/**
 * Plugin Name:     Woocommerce Display Attributes
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     woocommerce-display-attributes
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Woocommerce_Display_Attributes
 */

class WCDisplayAttributes {
  public function plugin_dir() {
    return untrailingslashit(plugin_dir_path( __FILE__ ));
  }

  public function include_file($path) {
    require($this->plugin_dir() . $path);
  }
}

$WCDA = new WCDisplayAttributes();

//
// Include scripts
//
$WCDA->include_file('/code/add-to-template-path.php');
$WCDA->include_file('/code/admin.php');

//
// Enqueue regular styles
//
function WCDA_enqueue_styles() {
  wp_enqueue_style('WCDA_styles', plugin_dir_url( __FILE__ ) . '/style.css');
}
add_action('wp_enqueue_scripts', 'WCDA_enqueue_styles');

