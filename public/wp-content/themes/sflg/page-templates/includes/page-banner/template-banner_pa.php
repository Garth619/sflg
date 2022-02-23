<div id='banner-wrapper'>
  <div id='banner-content'>
    <?php if (get_field('banner_h1') == "Yes"): ?>
    <h1 id='banner-title' class='h1-banner'><?php the_title();?>
    </h1>
    <!-- banner-title -->
    <?php else: ?>
    <?php if (get_field('banner_title')): ?>
    <span id='banner-title'><?php the_field('banner_title');?></span>
    <!-- banner-title -->
    <?php else: ?>
    <span id='banner-title'><?php the_field('global_internal_banner_title', 'option');?></span>
    <!-- banner-title -->
    <?php endif;?>
    <?php endif;?>
    <a class='internal-button button-one banner-button'
      href='#consultation'><span><?php the_field('global_internal_banner_button_verbiage', 'option');?></span></a>
    <!-- button-one -->
  </div><!-- banner-content -->
  <picture>
    <?php $globalBanners = get_field('global_internal_banner_image', 'option');
if (is_array($globalBanners)) {
    shuffle($globalBanners);
}
$internalBanners = get_field('internal_banner_image_new');
if (is_array($internalBanners)) {
    shuffle($internalBanners);
}
?>
    <?php if ($internalBanners[0]['desktop']['url']): ?>
    <source media='(min-width: 1650px)' srcset='<?php echo $internalBanners[0]['desktop']['url']; ?>'
      alt="<?php echo $globalBanners[0]['desktop']['alt']; ?>">
    <?php else: ?>
    <source media='(min-width: 1650px)' srcset='<?php echo $globalBanners[0]['desktop']['url']; ?>'
      alt="<?php echo $globalBanners[0]['desktop']['alt']; ?>">
    <?php endif;?>
    <?php if ($internalBanners[0]['large_laptop']['url']): ?>
    <source media='(min-width: 1380px)' srcset='<?php echo $internalBanners[0]['large_laptop']['url']; ?>'
      alt="<?php echo $internalBanners[0]['desktop']['alt']; ?>">
    <?php else: ?>
    <source media='(min-width: 1380px)' srcset='<?php echo $globalBanners[0]['large_laptop']['url']; ?>'
      alt="<?php echo $globalBanners[0]['large_laptop']['alt']; ?>">
    <?php endif;?>
    <?php if ($internalBanners[0]['small_laptop']['url']): ?>
    <source media='(min-width: 1170px)' srcset='<?php echo $internalBanners[0]['small_laptop']['url']; ?>'
      alt="<?php echo $internalBanners[0]['small_laptop']['alt']; ?>">
    <?php else: ?>
    <source media='(min-width: 1170px)' srcset='<?php echo $globalBanners[0]['small_laptop']['url']; ?>'
      alt="<?php echo $globalBanners[0]['small_laptop']['alt']; ?>">
    <?php endif;?>
    <?php if ($internalBanners[0]['tablet']['url']): ?>
    <source media='(min-width: 767px)' srcset='<?php echo $internalBanners[0]['tablet']['url']; ?>'
      alt="<?php echo $internalBanners[0]['tablet']['alt']; ?>">
    <?php else: ?>
    <source media='(min-width: 767px)' srcset='<?php echo $globalBanners[0]['tablet']['url']; ?>'
      alt="<?php echo $globalBanners[0]['tablet']['alt']; ?>">
    <?php endif;?>
    <?php if ($internalBanners[0]['mobile']['url']): ?>
    <img id='banner-image' src='<?php echo $internalBanners[0]['mobile']['url']; ?>'
      alt='<?php echo $internalBanners[0]['mobile']['alt']; ?>' />
    <?php else: ?>
    <img id='banner-image' src='<?php echo $globalBanners[0]['mobile']['url']; ?>'
      alt='<?php echo $globalBanners[0]['mobile']['alt']; ?>' />
    <?php endif;?>
  </picture>
  <img id='banner-wave' src='<?php bloginfo('template_directory');?>/images/int-hero-wave-styleguide.svg'
    alt='Wave Image' />
</div><!-- banner-wrapper -->