<?php get_header();?>
<div id="internal-main">
  <?php if (!get_field('disable_banner')) {
    get_template_part('page-templates/includes/page-banner/template', 'banner_pa');
}?>
  <?php if (get_field('banner_h1') == "Yes") {$banner_h1 = 'banner-h1';
}?>
  <div id='page-container' class='two-col <?php echo $banner_h1; ?>'>
    <div id='page-content'>
      <?php if (!get_field('banner_h1') == "Yes"): ?>
      <h1 id='page-title'><?php the_title();?></h1><!-- page-title -->
      <?php endif;?>
      <a class='internal-button button-one page-button'
        href='#consultation'><span><?php the_field('global_internal_banner_button_verbiage', 'option');?></span></a>
      <!-- button-one -->
      <span class='double-line'></span><!-- double-line -->
      <div id='page-content-inner' class='content'>
        <?php if (have_posts()): while (have_posts()): the_post();?>
        <?php the_content();?>
        <?php edit_post_link(__('Edit'), '', '');?>
        <?php endwhile;?>
        <?php endif;?>
      </div><!-- page-content-inner -->
    </div><!-- page-content -->
    <?php if (!get_field('disable_sidebar')) {
    get_sidebar();
}?>
  </div><!-- page-container -->
  <div id='pa-awards-wrapper'>
    <?php get_template_part('page-templates/includes/template', 'awards_component');?>
  </div><!-- pa-awards-wrapper -->
</div><!-- internal-main -->
<?php get_footer();?>