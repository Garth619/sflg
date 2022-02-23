<?php
if (is_page_template('page-templates/template-about.php')) {
    $wistiaID = 'about_wistia_id';
    $wistiaThumbnail = 'about_wistia_thumbnail';
    $wistiaTitle = 'about_wistia_title';
    $wistiaOption = '';
} else {
    $wistiaID = 'sidebar_wistia_id';
    $wistiaThumbnail = 'sidebar_video_thumbnail';
    $wistiaTitle = 'sidebar_video_title';
    $wistiaOption = 'option';
}
?>
<div class='single-video my-play-button-hover'>
  <div data-wistia='<?php the_field($wistiaID, $wistiaOption);?>'
    class='mywistia wistia_embed wistia_async_<?php the_field($wistiaID, $wistiaOption);?> popover=true popoverContent=html"'>
  </div><!-- mywistia -->
  <div class='single-video-thumb-wrapper'>
    <?php $sidebar_video_thumbnail = get_field($wistiaThumbnail, $wistiaOption);?>
    <?php if ($sidebar_video_thumbnail) {?>
    <img width="396" height="227" class='single-video-thumb' src="<?php echo $sidebar_video_thumbnail['url']; ?>"
      alt="<?php echo $sidebar_video_thumbnail['alt']; ?>" />
    <?php }?>
    <div class='single-video-overlay'>
      <span class='my-play-button'><span></span>
      </span><!-- play-button -->
    </div><!-- single-video-overlay -->
  </div><!-- single-video-thumb-wrapper -->
  <div class='single-video-title-wrapper'>
    <span><?php the_field($wistiaTitle, $wistiaOption);?></span>
  </div><!-- single-video-title-wrapper -->
</div><!-- single-video -->