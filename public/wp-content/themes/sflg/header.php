<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
  <meta charset="<?php bloginfo('charset');?>" />
  <!-- <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"> -->
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <?php
/**
 * Preload Fonts, Images and SVGs
 * */
get_template_part('page-templates/includes/template', 'preload');?>
  <title>
    <?php
global $page, $paged;
wp_title('|', true, 'right');
bloginfo('name');
$site_description = get_bloginfo('description', 'display');
if ($site_description && (is_home() || is_front_page())) {echo " | $site_description";}
if (($paged >= 2 || $page >= 2) && !is_404()) {echo esc_html(' | ' . sprintf(__('Page %s', ''), max($paged, $page)));}
?>
  </title>
  <?php wp_head();?>
  <?php the_field('schema_code', 'option');?>
  <?php the_field('analytics_code', 'option');?>
</head>
<?php
$disable_sidebar = get_field('disable_sidebar');
if (!is_front_page()) {
    if ($disable_sidebar) {
        $sidebar = 'no-sidebar';
    }
    if (!$disable_sidebar) {
        $sidebar = 'has-sidebar';
    }
}
?>

<body <?php body_class($sidebar);?>>
  <header>
    <div id='inner-header'>
      <div id='header-left'>
        <?php $logo_new = get_field('logo_new', 'option');?>
        <a id='logo' href='<?php bloginfo('url');?>'>
          <img width="241" height="53" src="<?php echo $logo_new['url']; ?>" alt="<?php echo $logo_new['alt']; ?>" />
        </a><!-- logo -->
      </div><!-- header-left -->
      <div id='header-middle'>
        <nav>
          <?php wp_nav_menu(array('container_class' => 'menu-header', 'theme_location' => 'main_menu'));?>
        </nav>
        <div id='menu-wrapper'>
          <span class='menu-bar'></span>
          <span class='menu-bar'></span>
          <span class='menu-bar'></span>
          <span id='menu-title'>Menu</span>
        </div><!-- menu-wrapper -->
      </div><!-- header-middle -->
      <div id='header-right'>
        <div id='cta'>
          <span><?php the_field('header_call_to_action', 'option');?></span>
          <a
            href='tel:+1<?php echo str_replace(['-', '(', ')', ' ', '.'], '', get_field('phone_new', 'option')); ?>'><?php the_field('phone_new', 'option');?></a>
        </div><!-- cta -->
      </div><!-- header-right -->
    </div><!-- inner-header -->
  </header>