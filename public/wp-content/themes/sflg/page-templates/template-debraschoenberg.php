<?php
/* Template Name: Debra Schoenberg */
get_header();?>
<div id="internal-main">
  <?php get_template_part('page-templates/includes/page-banner/template', 'banner_debra');?>
  <div id='page-container' class='debra-content'>
    <div id='att-spacer'>
      <?php $wistiavideo = get_field('wistia_video_id_debra');
if ($wistiavideo) {
    $hasVideo = 'has-video';
}
?>
      <div id='debra-img' class='<?php echo $hasVideo; ?>'>
        <?php if ($wistiavideo) {?>
        <div data-wistia='<?php the_field('wistia_video_id_debra');?>'
          class='mywistia wistia_embed wistia_async_<?php the_field('wistia_video_id_debra');?> popover=true popoverContent=html"'>
        </div><!-- mywistia -->
        <?php }?>
        <div id='debra-img-inner'>
          <?php $photo = get_field('photo');?>
          <?php if ($photo): ?>
          <img width="600" height="717" src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" />
          <?php else: ?>
          <div class='att-placeholder-wrapper'>
            <span class='att-placeholder-title'>Photo Coming Soon</span><!-- att-placeholder -->
          </div><!-- placeholder-wrapper -->
          <img width="600" height="717" src='<?php bloginfo('template_directory');?>/images/placeholder.png'
            alt='Attorney Placeholder Image' />
          <?php endif;?>
        </div><!-- debra-img-inner -->
        <?php if ($wistiavideo) {?>
        <div id='debra-title-wrapper'>
          <span id='debra-title'><?php the_field('video_call_to_action_debra');?></span><!-- debra-title -->
          <span id='debra-play'></span><!-- debra-play -->
        </div><!-- debra-title-wrapper -->
        <?php }?>
      </div><!-- att-img -->
    </div><!-- att-spacer -->
    <div id='page-content'>
      <div id='page-content-inner' class='content'>
        <?php the_content();?>
      </div><!-- page-content-inner -->
    </div><!-- page-content -->
  </div><!-- page-container -->
  <?php // get_template_part('page-templates/includes/template', 'awards_component');?>
</div><!-- internal-main -->
<?php get_footer();?>