<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
?>
<!-- Header Zone -->
<header id="header" role="banner" class="hd">
  <section class="hd__navigation">
    <div class="grid-cont">
      <div class="hd__navigation-left clearfix">
        <div class="logo">
          <?php if ($logo): ?>
            <a class="logo__link navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
              <img class="logo__image" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          <?php endif; ?>
        </div>
        <?php if (!empty($main_menu) || !empty($secondary_menu) || !empty($page['navigation'])): ?>
          <button type="button" class="menu-bar__button" data-target="#menu-collapsible">
            <span class="visually-hidden"><?php print t('Toggle navigation'); ?></span>
            <span class="menu-bar__button__bar"></span>
            <span class="menu-bar__button__bar"></span>
            <span class="menu-bar__button__bar"></span>
          </button>
        <?php endif; ?>

      </div>
      <div class=" menu-bar--collapsible hd__navigation-right" id="menu-collapsible">
        <div class="hd__navigation-right-nav" >
          <?php if (!empty($main_menu)): ?>
            <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('menu', 'clearfix')), 'heading' => t('Main menu'))); ?>
          <?php endif; ?>
          <?php if(user_is_anonymous()) :?>
            <ul class="menu">
              <li class="leaf">
                <?php print(l(t('Join Us'), 'user/register', array('attributes' => array('class' => array('join-us','link--spl'))))); ?>
              </li>
            </ul>
          <?php endif; ?>        
          <?php if (!empty($secondary_menu)): ?>
            <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('menu', 'clearfix')), 'heading' => t('Secondary menu'))); ?>
          <?php endif; ?>          
        </div>
      </div>
    </div>
  </section>

  <?php if (!empty($page['header'])): ?>
  <section class="hd__header">
    <div class="grid-cont">
      <?php print render($page['header']); ?>
    </div>
  </section>  
  <?php endif; ?>

  <?php if (!empty($page['highlighted'])): ?>
  <section class="hd__highlighted">
    <div class="grid-cont">
      <?php print render($page['highlighted']); ?>  
      <?php if(user_is_anonymous()) :?>
        <div class="register__link">
          <?php print(l(t('Register'), 'user/register', array('attributes' => array('class' => array('register'))))); ?>
        </div>
      <?php endif; ?>        
    </div>
  </section>  
  <?php endif; ?>
</header>

<!-- Content Zone -->
<content class="ct" id="content">
  <?php if (!empty($page['pre_content'])): ?>
    <section class="ct__precontent">
      <div class="grid-cont">
        <?php print render($page['pre_content']); ?>
    </div>
  </section>
  <?php endif; ?>
  <section class="ct__main-content">
    <div class="grid-cont">
      <section>
          <!-- Not rendering breadcrumb - not needed -->
          <a id="main-content"></a>
          <?php print render($title_prefix); ?>
          <?php if (!empty($title)): ?>
            <h1 class="page-header"><?php print $title; ?></h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php print $messages; ?>
          <?php if (!empty($tabs)): ?>
            <?php print render($tabs); ?>
          <?php endif; ?>
          <?php if (!empty($page['help'])): ?>
            <?php print render($page['help']); ?>
          <?php endif; ?>
          <?php if (!empty($action_links)): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
          <?php print render($page['content']); ?>
      </section>    
    </div>
  </section>
</content>

<!-- Footer Zone -->
<footer class="ft" id="footer" role="footer">
<?php if (!empty($page['pre_footer'])): ?>
  <section class="ft__pre-footer">
    <div class="grid-cont--fluid">
      <?php print render($page['pre_footer']); ?>
    </div>
  </section>
<?php endif; ?>
<?php if (!empty($page['footer'])): ?>
  <section class="ft__footer ">
    <div class="grid-cont">
      <?php print render($page['footer']); ?>
    </div>
  </section>
<?php endif; ?>
</footer>