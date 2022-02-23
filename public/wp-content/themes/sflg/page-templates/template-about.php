<?php
/* Template Name: About */
get_header();?>
<div id="internal-main">
  <?php if (!get_field('disable_banner')) {
    get_template_part('page-templates/includes/page-banner/template', 'banner_pa');
}?>
  <?php if (get_field('banner_h1') == "Yes") {
    $banner_h1 = 'banner-h1';
}?>
  <div id='page-container' class='<?php echo $banner_h1; ?>'>
    <a class='internal-button button-one page-button'
      href='#consultation'><span><?php the_field('global_internal_banner_button_verbiage', 'option');?></span></a>
    <!-- button-one -->
    <div id='about-top'>
      <div id='about-top-content' class='content'>
        <?php the_content();?>
      </div><!-- about-top-content -->
      <div id='about-top-image'>
        <?php $about_image_one = get_field('about_image_one');?>
        <?php if ($about_image_one) {?>
        <img width="459" height="480" src="<?php echo $about_image_one['url']; ?>"
          alt="<?php echo $about_image_one['alt']; ?>" />
        <?php }?>
      </div><!-- about-top-image -->
    </div><!-- about-top -->
    <div id='about-awards-components'>
      <?php get_template_part('page-templates/includes/template', 'awards_component');?>
    </div><!-- about-awards-components -->
    <div id='about-bottom'>
      <div id='about-bottom-content' class='content'>
        <?php the_field('about_bottom_content_one');?>
        <div id='about-bottom-sidebar'>
          <?php $about_bottom_sidebar_image = get_field('about_bottom_sidebar_image');?>
          <?php if ($about_bottom_sidebar_image) {?>
          <img width="645" height="538" src="<?php echo $about_bottom_sidebar_image['url']; ?>"
            alt="<?php echo $about_bottom_sidebar_image['alt']; ?>" />
          <?php }?>
          <div id='about-info-box' class='info-box'>
            <div id='about-info-box-inner' class='info-box-inner'>
              <span id='about-info-box-title'><?php the_field('about_sidebar_info_title');?></span>
              <!-- about-info-box-title -->
              <div class='dots-wrapper'>
                <span></span>
                <span></span>
                <span></span>
              </div><!-- dots-wrapper -->
              <div id='about-info-description'><?php the_field('about_sidebar_info_quote');?></div>
              <!-- about-info-description -->
              <a class='button-two about-button'
                href='<?php the_field('about_sidebar_info_button_page_link');?>'><?php the_field('about_sidebar_info_button_verbiage');?></a>
              <!-- button-two -->
            </div><!-- info-box-inner -->
          </div><!-- info-box-inner -->
        </div><!-- about-bottom-sidebar -->
        <div id='about-video'>
          <?php if (get_field('about_wistia_id') || get_field('about_wistia_thumbnail') || get_field('about_wistia_title')) {?>
          <?php get_template_part('page-templates/includes/template', 'video');?>
          <?php }?>
        </div><!-- about-video -->
        <?php the_field('about_bottom_content_two');?>
      </div><!-- about-bottom-content -->
      <div id='about-spacer'></div>
    </div><!-- about-bottom -->
  </div><!-- page-container -->
</div><!-- internal-main -->
<?php get_footer();?>