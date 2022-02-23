<?php
// global
$awardsTitle = 'awards_and_memberships_title';
$awardsContent = 'awards_and_memberships_content';
$awardsLink = 'awards_and_memberships_button_link';
$awardsButton = 'awards_and_memberships_button_verbiage';
$awardsLogos = 'awards_and_memberships_logos';
$awardsOption = 'option';
if (
    // about page
    get_field('awards_and_memberships_title_about') ||
    get_field('awards_and_memberships_content_about') ||
    get_field('awards_and_memberships_button_link_about') ||
    get_field('awards_and_memberships_button_verbiage_about') ||
    get_field('awards_and_memberships_logos_about')
) {
    $awardsTitle = 'awards_and_memberships_title_about';
    $awardsContent = 'awards_and_memberships_content_about';
    $awardsLink = 'awards_and_memberships_button_link_about';
    $awardsButton = 'awards_and_memberships_button_verbiage_about';
    $awardsLogos = 'awards_and_memberships_logos_about';
    $awardsOption = '';
}
if (
    // section three
    get_field('section_three_awards_and_memberships_title') ||
    get_field('section_three_awards_and_memberships_content') ||
    get_field('awards_and_memberships_button_verbiage_about') ||
    get_field('section_three_awards_and_memberships_button_link') ||
    get_field('awards_and_memberships_logos_about')
) {
    $awardsTitle = 'section_three_awards_and_memberships_title';
    $awardsContent = 'section_three_awards_and_memberships_content';
    $awardsLink = 'section_three_awards_and_memberships_button_link';
    $awardsButton = 'section_three_awards_and_memberships_button_verbiage';
    $awardsLogos = 'section_three_awards_and_memberships_logos';
    $awardsOption = '';
}
$local = get_field('awards_and_memberships_local_option');
// att profiles
if (is_page_template(array('page-templates/template-debraschoenberg.php', 'page-templates/template-attprofile.php'))) {
    if ($local) {
        $awardsTitle = 'awards_and_memberships_title_new';
        $awardsContent = 'awards_and_memberships_content_new';
        $awardsLink = 'awards_and_memberships_button_link_new';
        $awardsButton = 'awards_and_memberships_button_verbiage_new';
        $awardsLogos = 'awards_and_memberships_logos_new';
        $awardsOption = '';
    }
}
?>
<div class='awards-component'>
  <span class='awards-title'><?php the_field($awardsTitle, $awardsOption);?></span><!-- awards-title -->
  <div class='awards-content content'>
    <?php the_field($awardsContent, $awardsOption);?>
  </div><!-- awards-content -->
  <a class='button-two awards-button'
    href='<?php the_field($awardsLink, $awardsOption);?>'><?php the_field($awardsButton, $awardsOption);?></a>
  <!-- button-two -->
  <div class='awards-slider-wrapper'>
    <div class='awards-arrow awards-arrow-left'>
      <img class='lazyload' data-src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='Arrow Image'
        width='15' height='30' loading='lazy' />
    </div><!-- awards-arrow -->
    <div class='awards-slider'>
      <div class='awards-slider-inner'>
        <?php if (have_rows($awardsLogos, $awardsOption)): ?>
        <?php while (have_rows($awardsLogos, $awardsOption)): the_row();?>
        <div class='awards-single-slide'>
          <div class='awards-single-slide-inner'>
            <?php
    $logos = get_sub_field('logos');
    if ($logos) {
        $class = $logos['title'];
        $class = strtolower($class);
        $class = str_replace(['-', '(', ')', ' '], '', $class);
        $class = preg_replace('/[0-9]+/', '', $class);

        ?>
            <img class='<?php echo $class; ?> lazyload' data-src="<?php echo $logos['url']; ?>"
              alt="<?php echo $logos['alt']; ?>" height='120' loading='lazy' />
            <?php }?>
          </div><!-- awards-single-slide-inner -->
        </div><!-- awards-single-slide -->
        <?php endwhile;?>
        <?php endif;?>
      </div><!-- awards-slider -->
    </div><!-- awards-slider-inner -->
    <div class='awards-arrow awards-arrow-right'>
      <img class='lazyload' data-src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='Arrow Image'
        width='15' height='30' loading='lazy' />
    </div><!-- awards-arrow -->
  </div><!-- awards-slider-wrapper -->
</div><!-- awards-component -->