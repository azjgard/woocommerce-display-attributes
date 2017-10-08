<?php

add_filter(
  'woocommerce_locate_template',
  'WCDA_woocommerce_locate_template', 10, 3 );

// get absolute path to this directory
function WCDA_get_plugin_template_dir() {
  return untrailingslashit(plugin_dir_path( __FILE__ ) . '/../templates');
}

function WCDA_woocommerce_locate_template($template, $template_name, $template_path) {

  // WooCommerce global object
  global $woocommerce;

  // store a reference to the $template variable, which we are
  // going to modify
  $_template = $template;

  // set the path to this plugin
  $plugin_path  = WCDA_get_plugin_template_dir() . '/woocommerce/';

  // if no template path is specified, then use the woocommerce
  // template url
  if (!$template_path) {
    $template_path = $woocommerce->template_url;
  } 

  // Look within passed path within the theme - this is priority
  $template = locate_template(
    array(
      $template_path . $template_name,
      $template_name
    )
  );

  // Modification: Get the template from this plugin, if it exists
  if (!$template && file_exists($plugin_path . $template_name)) {
    $template = $plugin_path . $template_name;
  }

  // Use default template
  if (!$template) {
    $template = $_template; 
  }

  // Return what we found
  return $template;
}
