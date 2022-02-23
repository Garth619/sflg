<section id='section-eight'>
  <div id='sec-eight-inner'>
    <div id='sec-eight-content' class='content'>
      <span id='sec-eight-title'><?php the_field('section_eight_title');?></span><!-- sec-eight-title -->
      <?php the_field('section_eight_content');?>
    </div><!-- sec-eight-content -->
    <div id='sec-eight-image'>
      <?php $section_eight_image = get_field('section_eight_image');?>
      <?php if ($section_eight_image) {?>
      <img class='lazyload' data-src="<?php echo $section_eight_image['url']; ?>"
        alt="<?php echo $section_eight_image['alt']; ?>" width='620' height='517' loading='lazy' />
      <?php }?>
    </div><!-- sec-eight-image -->
  </div><!-- sec-eight-inner -->
</section><!-- section-eight -->