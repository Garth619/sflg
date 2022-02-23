<?php
/* Template Name: Contact */
get_header();?>
<div id="internal-main">
  <?php if (!get_field('disable_banner')) {
    get_template_part('page-templates/includes/page-banner/template', 'banner_pa');
}?>
  <?php if (get_field('banner_h1') == "Yes") {

    $banner_h1 = 'banner-h1';

}?>
  <div id='page-container' class='single-col'>
    <a class='internal-button button-one page-button'
      href='#consultation'><span><?php the_field('global_internal_banner_button_verbiage', 'option');?></span></a>
    <!-- button-one -->
    <div id='contact-wrapper'>
      <?php get_template_part('page-templates/includes/template', 'contact_info');?>
    </div><!-- contact-wrapper -->
  </div><!-- page-container -->
  <?php get_template_part('page-templates/includes/template', 'awards_component');?>
</div><!-- internal-main -->
<?php get_footer();?>