<?php get_header();?>
<div id="internal-main">
  <?php if (!get_field('disable_banner')) {
    get_template_part('page-templates/includes/page-banner/template', 'banner_blog');
}?>
  <div id='page-container' class='two-col'>
    <div id='page-content'>
      <a class='internal-button button-one page-button'
        href='#consultation'><span><?php the_field('global_internal_banner_button_verbiage', 'option');?></span></a>
      <!-- button-one -->
      <div id='page-content-inner'>
        <?php get_template_part('loop', 'index');?>
      </div><!-- page-content-inner -->
    </div><!-- page-content -->
    <?php if (!get_field('disable_sidebar')) {
    get_sidebar();
}?>
  </div><!-- page-container -->
  <?php get_template_part('page-templates/includes/template', 'awards_component');?>
</div><!-- internal-main -->
<?php get_footer();?>