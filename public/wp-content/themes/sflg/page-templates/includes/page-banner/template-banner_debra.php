<div id='banner-wrapper' class='debra-banner'>
  <div id='banner-inner'>
    <div id='banner-content'>
      <h1 id='banner-title' class='h1-banner'><?php the_title();?>
      </h1>
      <!-- banner-title -->
      <span class='double-line'></span><!-- double-line -->
      <span class='banner-position'><?php the_field('position_newacf');?></span><!-- banner-position -->
    </div><!-- banner-content -->
    <div id='banner-spacer'>
    </div><!-- banner-spacer -->
    <img id='banner-wave' src='<?php bloginfo('template_directory');?>/images/bio-wave2-01.svg' alt='Wave Image' />
  </div><!-- banner-inner -->
</div><!-- banner-wrapper -->