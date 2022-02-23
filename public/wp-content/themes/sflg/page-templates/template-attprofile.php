<?php
/* Template Name: Attorney Profile */
get_header();?>
<div id="internal-main">
  <?php get_template_part('page-templates/includes/page-banner/template', 'banner_att');?>
  <div id='page-container' class='two-col att-content'>
    <div id='att-spacer'></div><!-- att-spacer -->
    <div id='page-content'>
      <div id='page-content-inner' class='content'>
        <?php the_content();?>
      </div><!-- page-content-inner -->
    </div><!-- page-content -->
  </div><!-- page-container -->
</div><!-- internal-main -->
<?php get_footer();?>