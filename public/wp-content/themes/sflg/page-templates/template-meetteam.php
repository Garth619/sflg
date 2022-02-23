<?php
/* Template Name: Meet the Team */
get_header();?>
<div id="internal-main">
  <?php if (!get_field('disable_banner')) {
    get_template_part('page-templates/includes/page-banner/template', 'banner_pa');
}?>
  <?php if (get_field('banner_h1') == "Yes") {
    $banner_h1 = 'banner-h1';
}?>
  <div id='page-container' class='single-col'>
    <a class='internal-button button-one page-button'
      href='#consultation'><span><?php the_field('global_internal_banner_button_verbiage', 'option');?></span></a>
    <!-- button-one -->
    <span class='double-line'></span><!-- double-line -->
    <div id='meet-team-content' class='content'>
      <?php the_content();?>
    </div><!-- meet-team-content -->
    <div id='meet-team-wrapper'>
      <?php $meet_the_team = get_field('meet_the_team');?>
      <?php if ($meet_the_team): ?>
      <?php foreach ($meet_the_team as $post): ?>
      <?php setup_postdata($post);?>
      <div class='single-att'>
        <a href='<?php the_permalink();?>'>
          <div class='single-att-image'>
            <?php $photo = get_field('photo');?>
            <?php if ($photo): ?>
            <img width='422' height='494' class='single-att-image' src="<?php echo $photo['url']; ?>"
              alt="<?php echo $photo['alt']; ?>" />
            <?php else: ?>
            <div class='att-placeholder-wrapper'>
              <span class='att-placeholder-title'>Photo Coming Soon</span><!-- att-placeholder -->
            </div><!-- placeholder-wrapper -->
            <img width='422' height='494' class='single-att-image'
              src='<?php bloginfo('template_directory');?>/images/placeholder.png' alt='Attorney Placeholder Image' />
            <?php endif;?>
            <div class='single-att-image-overlay <?php $photo ?: $purple = 'purple';
echo $purple;
?>'></div>
            <!-- single-att-image-overlay -->
          </div><!-- single-att-image -->
          <div class='single-att-title-wrapper'>
            <span class='single-att-name'><?php the_title();?></span><!-- single-att-name -->
            <span class='single-att-position'><?php the_field('position_newacf');?></span><!-- single-att-position -->
          </div><!-- single-att-title-wrapper -->
        </a>
      </div><!-- single-att -->
      <?php endforeach;?>
      <?php wp_reset_postdata();?>
      <?php endif;?>
    </div><!-- meet-team-wrapper -->
  </div><!-- page-container -->
</div><!-- internal-main -->
<?php get_footer();?>