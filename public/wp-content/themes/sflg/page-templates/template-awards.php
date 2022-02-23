<?php
/* Template Name: Awards and Recognition */
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
    <div id='awards-recognitions'>
      <?php if (have_rows('awards_and_recognition')): ?>
      <?php while (have_rows('awards_and_recognition')): the_row();?>
      <div class='single-awards-recognitions'>
        <div class='single-awards-recognitions-img'>
          <?php $image = get_sub_field('image');?>
          <?php if ($image) {?>
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          <?php }?>
        </div><!-- single-awards-recognitions-img -->
        <div class='single-awards-recognitions-content content'>
          <div class='single-awards-recognitions-content-inner'>
            <h2><?php the_sub_field('title');?></h2>
            <p class='intro'><strong><?php the_sub_field('bold_intro_title');?></strong></p>
            <?php the_sub_field('content');?>
          </div><!-- single-awards-recognitions-content-inner -->
        </div><!-- single-awards-recognitions-content -->
      </div><!-- single-awards-recognitions -->
      <?php endwhile;?>
      <?php endif;?>
    </div><!-- awards-recognitions -->
  </div><!-- page-container -->
</div><!-- internal-main -->
<?php get_footer();?>