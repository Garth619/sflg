<?php get_header();?>
<div id="internal-main">
  <?php if (!get_field('disable_banner')) {
    get_template_part('page-templates/includes/page-banner/template', 'banner_pa');
}?>
  <?php if (get_field('banner_h1') == "Yes") {
    $banner_h1 = 'banner-h1';
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
      <div id='page-content-inner'>
        <div class='post-meta'>
          <span class='post-category'>
            Posted In
            <?php echo get_the_category_list(); ?></span>
          <span class='post-date'> On <?php $pfx_date = get_the_date();
echo $pfx_date;?></span>
          <!-- post-date -->
        </div><!-- post-meta -->
        <div class='content'><?php the_content();?></div>
        <?php get_template_part('page-templates/includes/template', 'infoslider_component');?>
      </div><!-- page-content-inner -->
    </div><!-- page-content -->
    <?php if (!get_field('disable_sidebar')) {
    get_sidebar();
}?>
  </div><!-- page-container -->
  <?php get_template_part('page-templates/includes/template', 'awards_component');?>
</div><!-- internal-main -->
<?php get_footer();?>