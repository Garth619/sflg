<div id='banner-wrapper'>
  <div id='banner-content'>
    <?php if (is_home()) {?>
    <h1 id='banner-title' class='banner-title-blog'><?php $blog_title = get_the_title(get_option('page_for_posts', true));
    echo $blog_title;?></h1>
    <!-- page-title -->
    <?php }?>
    <?php if (is_category()) {?>
    <h1 id='banner-title' class='banner-title-blog'>
      <?php single_cat_title();?>
    </h1>
    <!-- page-title -->
    <?php }?>
    <?php if (is_archive() && !is_category()) {?>
    <h1 id='banner-title' class='banner-title-blog'>
      <?php printf(__('<span>%s</span>'), get_the_date(_x('Y', 'yearly archives date format')));?>
    </h1>
    <!-- page-title -->
    <?php }?>
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