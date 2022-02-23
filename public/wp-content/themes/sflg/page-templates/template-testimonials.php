<?php
/* Template Name: Testimonials */
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
    <div id='testimonials-wrapper'>
      <?php if (have_rows('testimonials')): ?>
      <?php while (have_rows('testimonials')): the_row();?>
      <div class='single-testi info-box'>
        <div class='single-testi-inner info-box-inner'>
          <img class='star' src='<?php bloginfo('template_directory');?>/images/test-stars.svg' alt='Stars Image'
            width='130' height='23' />
          <span class='single-testi-title'><?php the_sub_field('quote_title');?></span><!-- single-testi-title -->
          <div class='single-testi-content content'>
            <?php the_sub_field('quote_text');?>
          </div><!-- single-testi-content -->
          <span class='single-testi-name'> <?php the_sub_field('quote_source');?></span><!-- single-testi-name -->
        </div><!-- single-testi-inner -->
      </div><!-- single-testi -->
      <?php endwhile;?>
      <?php endif;?>
    </div><!-- testimonials-wrapper -->
  </div><!-- page-container -->
</div><!-- internal-main -->
<?php get_footer();?>