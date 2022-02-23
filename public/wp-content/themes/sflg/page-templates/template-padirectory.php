<?php
/* Template Name: PA Directory */
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
    <div id='pa-directory'>
      <?php if (get_field('practice_area_directory')): ?>
      <ul class="pa_directory_top_menu">
        <?php while (has_sub_field('practice_area_directory')): ?>
        <li>
          <span class='title-wrapper'>
            <a><?php the_sub_field('title');?></a>
            <span class='double-line'></span><!-- double-line -->
          </span><!-- title-wrapper -->
          <?php $obj = get_sub_field('pa_nav_menu');?>
          <?php wp_nav_menu(array('menu' => $obj->name));?>
        </li>
        <?php endwhile;?>
      </ul><!-- pa_directory_top_menu -->
      <?php endif;?>
    </div><!-- pa-directory -->
  </div><!-- page-container -->
</div><!-- internal-main -->
<?php get_footer();?>