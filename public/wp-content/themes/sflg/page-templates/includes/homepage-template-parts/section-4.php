<section id='section-four'>
  <div id='sec-four-slider-wrapper'>
    <div class='sec-four-arrow sec-four-arrow-left'>
      <?php echo file_get_contents(get_template_directory() . '/images/arrow.svg'); ?>
    </div><!-- sec-four-arrow -->
    <div id='sec-four-slider'>
      <?php if (have_rows('section_four_practice_areas')): ?>
      <?php while (have_rows('section_four_practice_areas')): the_row();?>
      <div class='sec-four-single-slide'>
        <a href='<?php the_sub_field('link_new');?>'>
          <div class='sec-four-single-slide-inner'>
            <div class='sec-four-single-slide-reg'>
              <?php $icon = get_sub_field('icon');?>
              <?php if ($icon) {?>
              <img class='lazyload' data-src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" width='71'
                height='71' loading='lazy' />
              <?php }?>
              <div class='sec-four-single-slide-title-wrapper'>
                <span class='sec-four-single-slide-title'><?php the_sub_field('title');?></span>
                <!-- sec-four-single-slide-title -->
              </div><!-- sec-four-single-slide-title-wrapper -->
              <div class='dots-wrapper'>
                <span></span>
                <span></span>
                <span></span>
              </div><!-- dots-wrapper -->
            </div><!-- sec-four-single-slide-inner -->
          </div><!-- sec-four-single-slide-reg -->
          <div class='sec-four-single-slide-hover'>
            <div class='sec-four-single-hover-content'>
              <span class='sec-four-single-slide-description'><?php the_sub_field('hover_description');?></span>
              <!-- sec-four-single-slide-description -->
              <span
                class='button-two button-white sec-four-single-slide-button'><?php the_sub_field('hover_button_verbiage');?></span>
              <!-- button-two white -->
            </div><!-- sec-four-single-hover-content -->
          </div><!-- sec-four-single-slide-hover -->
        </a>
      </div><!-- sec-four-single-slide -->
      <?php endwhile;?>
      <?php endif;?>
    </div><!-- sec-four-slider -->
    <div class='sec-four-arrow sec-four-arrow-right'>
      <?php echo file_get_contents(get_template_directory() . '/images/arrow.svg'); ?>
    </div><!-- sec-four-arrow -->
  </div><!-- sec-four-slider-wrapper -->
  <img id='sec-four-top' class='lazyload' data-src='<?php bloginfo('template_directory');?>/images/test-wave-top.svg'
    alt='Wave Image' loading="lazy" />
  <picture>
    <?php $section_four_background_desktop = get_field('section_four_background_desktop');?>
    <?php if ($section_four_background_desktop) {?>
    <source media='(min-width: 1650px)' srcset='<?php echo $section_four_background_desktop['url']; ?>'>
    <?php }?>
    <?php $section_four_background_large_laptop = get_field('section_four_background_large_laptop');?>
    <?php if ($section_four_background_large_laptop) {?>
    <source media='(min-width: 1380px)' srcset='<?php echo $section_four_background_large_laptop['url']; ?>'>
    <?php }?>
    <?php $section_four_background_small_laptop = get_field('section_four_background_small_laptop');?>
    <?php if ($section_four_background_small_laptop) {?>
    <source media='(min-width: 1170px)' srcset='<?php echo $section_four_background_small_laptop['url']; ?>'>
    <?php }?>
    <?php $section_four_background_tablet = get_field('section_four_background_tablet');?>
    <?php if ($section_four_background_tablet) {?>
    <source media='(min-width: 768px)' srcset='<?php echo $section_four_background_tablet['url']; ?>'>
    <?php }?>
    <?php $section_four_background_mobile = get_field('section_four_background_mobile');?>
    <?php if ($section_four_background_mobile) {?>
    <img id='sec-four-bg' class='lazyload' data-src='<?php echo $section_four_background_mobile['url']; ?>'
      alt='Background Image' loading="lazy" />
    <?php }?>
  </picture>
  <img id='sec-four-bottom' class='lazyload'
    data-src='<?php bloginfo('template_directory');?>/images/test-wave-bottom.svg' alt='Wave Image' loading="lazy" />
</section><!-- section-four -->