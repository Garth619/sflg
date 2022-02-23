<?php
/**
 * Preload
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Link_types/preload
 * https://www.bronco.co.uk/our-ideas/using-relpreload-for-responsive-images/
 * https://csswizardry.com/2020/05/the-fastest-google-fonts/
 */

if (is_front_page()) {
    $section_one_icon = get_field('section_one_icon');
    if ($section_one_icon) {?>
<link rel="preload" as="image" type="image/svg+xml" href=" <?php echo $section_one_icon['url']; ?>" />
<?php }
    $section_one_background_desktop_webp = get_field('section_one_background_desktop_webp');
    if ($section_one_background_desktop_webp) {?>
<link rel="preload" as="image" type="image/webp" media='(min-width:1650px)'
  href="<?php echo $section_one_background_desktop_webp['url']; ?>" />
<?php }
    $section_one_background_large_laptop_webp = get_field('section_one_background_large_laptop_webp');
    if ($section_one_background_large_laptop_webp) {?>
<link rel="preload" as="image" type="image/webp" media='(max-width: 1380px) and (min-width:1650px)'
  href="<?php echo $section_one_background_large_laptop_webp['url']; ?>" />
<?php }
    $section_one_background_small_laptop_webp = get_field('section_one_background_small_laptop_webp');
    if ($section_one_background_small_laptop_webp) {?>
<link rel="preload" as="image" type="image/webp" media='(max-width: 1170px) and (min-width:1380px)'
  href="<?php echo $section_one_background_small_laptop_webp['url']; ?>" />
<?php }
    $section_one_background_tablet_webp = get_field('section_one_background_tablet_webp');
    if ($section_one_background_tablet_webp) {?>
<link rel="preload" as="image" type="image/webp" media='(max-width: 768px) and (min-width:1170px)'
  href="<?php echo $section_one_background_tablet_webp['url']; ?>'" />
<?php }
    $section_one_background_mobile_webp = get_field('section_one_background_mobile_webp');
    if ($section_one_background_mobile_webp) {?>
<link rel="preload" as="image" type="image/webp" media='(max-width: 768px)'
  href="<?php echo $section_one_background_mobile_webp['url']; ?>" />
<?php }?>
<link rel="preload" as="image" type="image/svg+xml"
  href="https://sflgnew.local/wp-content/themes/sflg/images/hero-wave.svg" />
<link rel="preload" as="image" type="image/svg+xml"
  href="https://sflgnew.local/wp-content/themes/sflg/images/test-stars.svg" />
<link rel="preload" as="image" type="image/svg+xml"
  href="https://sflgnew.local/wp-content/themes/sflg/images/arrow.svg" />
<?php
}
$logo_new = get_field('logo_new', 'option');
if ($logo_new) {?>
<link rel="preload" as="image" type="image/svg+xml" href="<?php echo $logo_new['url']; ?>" />
<?php }?>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="preload" as="style"
  href="https://fonts.googleapis.com/css2?family=Halant:wght@400%3B500&family=Oswald:wght@400%3B500%3B700&display=swap" />
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Halant:wght@400%3B500&family=Oswald:wght@400%3B500%3B700&display=swap"
  media="print" onload="this.media='all'" />