<div id='banner-wrapper' class='att-banner'>
  <div id='banner-inner'>
    <div id='banner-content'>
      <h1 id='banner-title' class='h1-banner'><?php the_title();?>
      </h1>
      <!-- banner-title -->
      <span class='double-line'></span><!-- double-line -->
      <span class='banner-position'><?php the_field('position_newacf');?></span><!-- banner-position -->
    </div><!-- banner-content -->
    <div id='banner-spacer'>
      <div id='att-img'>
        <div id='att-img-inner'>
          <?php $photo = get_field('photo');?>
          <?php if ($photo): ?>
          <img width='422' height='494' src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" />
          <?php else: ?>
          <div class='att-placeholder-wrapper'>
            <span class='att-placeholder-title'>Photo Coming Soon</span><!-- att-placeholder -->
          </div><!-- placeholder-wrapper -->
          <img width='422' height='494' src='<?php bloginfo('template_directory');?>/images/placeholder.png'
            alt='Att Placeholder Image' />
          <?php endif;?>
        </div><!-- att-img-inner -->
      </div><!-- att-img -->
    </div><!-- banner-spacer -->
    <img id='banner-wave' src='<?php bloginfo('template_directory');?>/images/bio-wave2-01.svg' alt='Wave Image' />
  </div><!-- banner-inner -->
</div><!-- banner-wrapper -->