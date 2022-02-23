<section id='section-one'>
  <div id='sec-one-inner'>
    <?php $section_one_icon = get_field('section_one_icon');?>
    <?php if ($section_one_icon) {?>
    <img id='bridge' src="<?php echo $section_one_icon['url']; ?>" alt="<?php echo $section_one_icon['alt']; ?>"
      width='145' height='123' />
    <?php }?>
    <span id='sec-one-title'><?php the_field('section_one_title');?></span><!-- sec-one-title -->
    <a class='button-one sec-one-button' href='#consultation'>
      <span><?php the_field('section_one_button_verbiage');?></span>
    </a><!-- button-one -->
  </div><!-- sec-one-inner -->
  <picture>
    <?php $section_one_background_desktop_webp = get_field('section_one_background_desktop_webp');?>
    <?php if ($section_one_background_desktop_webp) {?>
    <source media='(min-width: 1650px)' srcset='<?php echo $section_one_background_desktop_webp['url']; ?>'
      type='image/webp'>
    <?php }?>
    <?php $section_one_background_desktop = get_field('section_one_background_desktop');?>
    <?php if ($section_one_background_desktop) {?>
    <source media='(min-width: 1650px)' srcset='<?php echo $section_one_background_desktop['url']; ?>'>
    <?php }?>
    <?php $section_one_background_large_laptop_webp = get_field('section_one_background_large_laptop_webp');?>
    <?php if ($section_one_background_large_laptop_webp) {?>
    <source media='(min-width: 1380px)' srcset='<?php echo $section_one_background_large_laptop_webp['url']; ?>'
      type='image/webp'>
    <?php }?>
    <?php $section_one_background_large_laptop = get_field('section_one_background_large_laptop');?>
    <?php if ($section_one_background_large_laptop) {?>
    <source media='(min-width: 1380px)' srcset='<?php echo $section_one_background_large_laptop['url']; ?>'>
    <?php }?>
    <?php $section_one_background_small_laptop_webp = get_field('section_one_background_small_laptop_webp');?>
    <?php if ($section_one_background_small_laptop_webp) {?>
    <source media='(min-width: 1170px)' srcset='<?php echo $section_one_background_small_laptop_webp['url']; ?>'
      type='image/webp'>
    <?php }?>
    <?php $section_one_background_small_laptop = get_field('section_one_background_small_laptop');?>
    <?php if ($section_one_background_small_laptop) {?>
    <source media='(min-width: 1170px)' srcset='<?php echo $section_one_background_small_laptop['url']; ?>'>
    <?php }?>
    <?php $section_one_background_tablet_webp = get_field('section_one_background_tablet_webp');?>
    <?php if ($section_one_background_tablet_webp) {?>
    <source media='(min-width: 768px)' srcset='<?php echo $section_one_background_tablet_webp['url']; ?>'
      type='image/webp'>
    <?php }?>
    <?php $section_one_background_tablet = get_field('section_one_background_tablet');?>
    <?php if ($section_one_background_tablet) {?>
    <source media='(min-width: 768px)' srcset='<?php echo $section_one_background_tablet['url']; ?>'>
    <?php }?>
    <?php $section_one_background_mobile_webp = get_field('section_one_background_mobile_webp');?>
    <?php if ($section_one_background_mobile_webp) {?>
    <source srcset='<?php echo $section_one_background_mobile_webp['url']; ?>' type='image/webp'>
    <?php }?>
    <?php $section_one_background_mobile = get_field('section_one_background_mobile');?>
    <img id='hero-image' src='<?php echo $section_one_background_mobile['url']; ?>'
      alt='<?php echo $section_one_background_mobile['alt']; ?>' />
  </picture>
  <img id='hero-wave' src='<?php bloginfo('template_directory');?>/images/hero-wave.svg' alt='hero wave image' />
</section><!-- section-one -->