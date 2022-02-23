<?php
/**
 * Testimonial Slider
 *
 * Used in various sections of the website (gutenberg). Some Sliders have different number of slides showing, reference slick slider functions in main.js
 *
 * @css-class 'testimonial-info-slider' css that slick slider function initiates with
 */
$acfSliderLink = 'testimonials_link';
$acfSlider = 'testimonials_component';
$acfSliderOptions = 'options';
$sectiontwoSlider = get_field('section_two_testimonials');
$local = get_field('global_or_local_testimonials');
// section two
if (is_front_page()) {
    $slickSlider = 'full-width-four-slides';
    if ($sectiontwoSlider) {
        $acfSlider = 'section_two_testimonials';
        $acfSliderOptions = '';
    }
}
// att profiles
if (is_page_template(array('page-templates/template-debraschoenberg.php', 'page-templates/template-attprofile.php'))) {
    $slickSlider = 'att-slides';
}
// default pages
if (basename(get_page_template()) === 'page.php') {
    $slickSlider = 'pa-slides';
}
if ($local) {
    $acfSlider = 'gutenberg_testimonials_component';
    $acfSliderOptions = '';
}
?>
<div class='infoslider-component <?php echo $slickSlider; ?>-component'>
  <div class='info-arrow info-arrow-left <?php echo $slickSlider; ?>-left'>
    <img class='lazyload' data-src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='Arrow Image'
      width='15' height='30' loading='lazy' />
  </div><!-- info-arrow-left -->
  <div class='infoslider-slides-wrapper'>
    <div class='infoslider-slides <?php echo $slickSlider; ?>'>
      <?php if (have_rows($acfSlider, $acfSliderOptions)): ?>
      <?php while (have_rows($acfSlider, $acfSliderOptions)): the_row();?>
      <div class='infoslider-single-slide'>
        <a href='<?php the_field($acfSliderLink, $acfSliderOptions);?>' class='infoslider-link'>
          <div class='infoslider-single-slide-inner'>
            <img class='stars lazyload' data-src='<?php bloginfo('template_directory');?>/images/test-stars.svg'
              alt='Stars Image' width='130' height='23' loading='lazy' />
            <div class='infoslider-slide-title-wrapper'>
              <span class='infoslider-slide-title'><?php the_sub_field('title');?></span>
              <!-- infoslider-slide-title -->
            </div><!-- infoslider-slide-title-wrapper -->
            <span class='infoslider-slide-descrip'><?php the_sub_field('description');?></span>
            <!-- infoslider-slide-descrip -->
            <span class='infoslider-slide-name'><?php the_sub_field('name');?></span><!-- infoslider-slide-name -->
          </div>
          <!-- infoslider-single-slide-inner -->
        </a>
      </div><!-- infoslider-single-slide -->
      <?php endwhile;?>
      <?php endif;?>
    </div><!-- infoslider-slides -->
  </div><!-- infoslider-slides-wrapper -->
  <div class='info-arrow info-arrow-right <?php echo $slickSlider; ?>-right'>
    <img class='lazyload' data-src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='Arrow Image'
      width='15' height='30' loading='lazy' />
  </div><!-- info-arrow-right -->
</div><!-- infoslider-component -->