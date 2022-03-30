<section id='section-five'>
  <div id='sec-five-inner'>
    <div id='sec-five-top'>
      <div id='sec-five-top-content' class='content'>
        <span id='sec-five-title'><?php the_field('section_five_title');?></span>
        <!-- sec-five-title -->
        <span class='double-line'></span><!-- double-line -->
        <?php the_field('section_five_content_top');?>
      </div><!-- sec-five-top-content -->
      <div id='sec-five-top-sidebar'>
        <div id='sec-five-sidebar-img'>
          <?php $section_five_sidebar_image = get_field('section_five_sidebar_image');?>
          <?php if ($section_five_sidebar_image) {?>
          <img class='lazyload' data-src='<?php echo $section_five_sidebar_image['url']; ?>'
            alt='<?php echo $section_five_sidebar_image['alt']; ?>' width='777' height='812' loading='lazy' />
          <?php }?>
        </div><!-- sec-five-sidebar-img -->
        <div id='sec-five-sp-wrapper' class='info-box-wrapper'>
          <div class='info-arrow info-arrow-left sec-five-arrow-left'>
            <img class='lazyload' data-src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='arrow-image'
              width='15' height='30' loading='lazy' />
          </div><!-- sec-five-arrow sec-five-arrow-left -->
          <div id='sec-five-sp' class='info-box with-arrows'>
            <div class='info-box-inner'>
              <div id='sec-five-sp-slider'>
                <?php if (have_rows('section_five_selling_point')): ?>
                <?php while (have_rows('section_five_selling_point')): the_row();?>
                <div class='sec-five-single-sp'>
                  <span class='sec-five-single-sp-title'><?php the_sub_field('title');?></span>
                  <!-- sec-five-single-sp-title -->
                  <?php $icon = get_sub_field('icon');?>
                  <img
                    class='sec-five-single-sp-icon sec-five-single-sp-icon-<?php the_sub_field('icon_class');?> lazyload'
                    data-src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" heeight='61'
                    loading='lazy' />
                  <div class='dots-wrapper'>
                    <span></span>
                    <span></span>
                    <span></span>
                  </div><!-- dots-wrapper -->
                  <div class='sec-five-single-sp-descrip content'>
                    <p><?php the_sub_field('description');?></p>
                  </div><!-- sec-five-single-sp-descrip -->
                </div><!-- sec-five-single-sp -->
                <?php endwhile;?>
                <?php endif;?>
              </div><!-- sec-five-sp-slider -->
              <span id='sec-five-sp-counter'></span><!-- sec-five-sp-counter -->
            </div><!-- sec-five-sp-inner -->
          </div><!-- sec-five-sp -->
          <div class='info-arrow info-arrow-right sec-five-arrow-right'>
            <img class='lazyload' data-src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='arrow-image'
              width='15' height='30' loading='lazy' />
          </div><!-- sec-five-arrow sec-five-arrow-right -->
        </div><!-- sec-five-sp-wrapper -->
      </div><!-- sec-five-top-sidebar -->
    </div><!-- sec-five-top -->
    <div id='sec-five-bottom'>
      <div id='sec-five-info-box-wrapper'>
        <div id='sec-five-info-box' class='info-box'>
          <div class='info-box-inner'>
            <a>
              <div id='sec-five-info-box-left'>
                <?php $section_five_info_box_image = get_field('section_five_info_box_image');?>
                <?php if ($section_five_info_box_image) {?>
                <img class='lazyload' data-src="<?php echo $section_five_info_box_image['url']; ?>"
                  alt="<?php echo $section_five_info_box_image['alt']; ?>" width='230' height='376' loading='lazy' />
                <?php }?>
              </div><!-- sec-five-info-box-left -->
              <div id='sec-five-info-box-right' class='content'>
                <span id='sec-five-info-box-title'><?php the_field('section_five_info_box_title');?></span>
                <!-- sec-five-info-box-title -->
                <span class='sec-five-info-box-subtitle'><?php the_field('section_five_info_box_subtitle_one');?></span>
                <!-- sec-five-info-box-subtitle -->
                <span
                  class='sec-five-info-box-subtitle sec-five-info-box-subtitle-two'><?php the_field('section_five_info_box_subtitle_two');?></span>
                <!-- sec-five-info-box-subtitle -->
                <?php the_field('section_five_info_box_content');?>
                <span
                  class='button-two sec-five-info-box-button'><?php the_field('section_five_info_box_button_verbiage');?></span>
                <!-- button-one -->
              </div><!-- sec-five-info-box-right -->
            </a>
          </div><!-- info-box-inner -->
        </div><!-- sec-five-info-box -->
      </div><!-- sec-five-info-box-wrapper -->
      <div id='sec-five-botton-content' class='content'>
        <?php the_field('section_five_content_bottom');?>
      </div><!-- sec-five-botton-content -->
    </div><!-- sec-five-bottom -->
  </div><!-- sec-five-inner -->
</section><!-- section-five -->
<div id='sec-five-overlay'>
  <div id='sec-five-overlay-inner' class='info-box content'>
    <div class='info-box-inner'>
      <span id='sec-five-close'>Close</span>
      <h2 id='sec-five-overlay-title'>Request a Copy</h2>
      <?php gravity_form(3, false, false, false, '', true, 13);?>
    </div>
  </div>
</div>