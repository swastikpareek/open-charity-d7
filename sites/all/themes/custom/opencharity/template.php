<?php 
/**
 * @file
 * The primary PHP file for the Drupal Open Charity theme
 */

/**
 * Pre-processes variables for the "region" theme hook.
 *
 * See template for list of available variables.
 *
 * @param array $vars
 *   An associative array of variables, passed by reference.
 *
 * @see region.tpl.php
 *
 * @ingroup theme_preprocess
 */
function opencharity_preprocess_region(&$vars){
  $vars['classes_array'][1] = 'region--' . $vars['region'];
}

/**
 * Pre-processes variables for the "block" theme hook.
 *
 * See template for list of available variables.
 *
 * @param array $vars
 *   An associative array of variables, passed by reference.
 *
 * @see block.tpl.php
 *
 * @ingroup theme_preprocess
 */
function opencharity_preprocess_block(&$vars){
  $vars['classes_array'][1] = drupal_html_class('block--' . $vars['block']->module);
}

/**
 * Pre-processes variables for the "views-view" theme hook.
 *
 * See template for list of available variables.
 *
 * @param array $vars
 *   An associative array of variables, passed by reference.
 *
 * @see views-view.tpl.php
 *
 * @ingroup theme_preprocess
 */

function opencharity_preprocess_views_view(&$vars) {
  $vars['classes_array'][1] = 'view--' . drupal_clean_css_identifier($vars['name']);
  
  $view = $vars['view'];
  
  if ($view->name == 'members') {
    drupal_add_js(libraries_get_path('easing') . '/jquery.easing.min.js');
    drupal_add_js(libraries_get_path('slick') . '/slick/slick.min.js');
    drupal_add_js(drupal_get_path('theme', 'opencharity') . '/js/slick/slideshow-members.js');

    drupal_add_css(libraries_get_path('slick') . '/slick/slick.css');
    drupal_add_css(libraries_get_path('slick') . '/slick/slick-theme.css');
  }

  if ($view->name == 'blog' && $vars['display_id'] == 'block') {
    drupal_add_js(libraries_get_path('easing') . '/jquery.easing.min.js');
    drupal_add_js(libraries_get_path('slick') . '/slick/slick.min.js');
    drupal_add_js(drupal_get_path('theme', 'opencharity') . '/js/slick/slideshow-blog.js');

    drupal_add_css(libraries_get_path('slick') . '/slick/slick.css');
    drupal_add_css(libraries_get_path('slick') . '/slick/slick-theme.css');
  }  
}
