<?php if (is_home() || is_category() || is_archive() || is_single()) {$sidebarBlog = 'sidebar-blog';}?>
<div id='sidebar-wrapper' class='<?php echo $sidebarBlog; ?>'>
  <?php if (get_field('sidebar_wistia_id', 'option') || get_field('sidebar_video_thumbnail', 'option') || get_field('sidebar_video_title', 'option')) {?>
  <?php get_template_part('page-templates/includes/template', 'video');?>
  <?php }?>
  <?php if (has_bulk_sidebar()) {bulk_sidebar();}
;?>
  <?php if (get_field('sidebar_box_title', 'option') || get_field('sidebar_box_description', 'option') || get_field('sidebar_box_button_verbiage', 'option') || get_field('sidebar_box_button_link', 'option')) {?>
  <div class='widget'>
    <h3><?php the_field('sidebar_box_title', 'option');?></h3>
    <span class='widget-description'><?php the_field('sidebar_box_description', 'option');?></span>
    <a class='button-two widget-button' href='<?php the_field('sidebar_box_button_link', 'option');?>'>
      <?php the_field('sidebar_box_button_verbiage', 'option');?>
    </a><!-- button-two -->
  </div><!-- widget -->
  <?php }?>
</div><!-- sidebar-wrapper -->