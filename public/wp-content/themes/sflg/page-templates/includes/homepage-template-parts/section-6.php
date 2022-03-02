<section id='section-six'>
  <span id='sec-six-title'><?php the_field('section_six_title');?></span></span><!-- sec-six-title -->
  <div id='sec-six-inner'>
    <div id='sec-six-img-wrapper'>
      <div id='sec-six-play-wrapper'>
        <div id='sec-six-play-inner' class='my-play-button-hover'>
          <div data-wistia='<?php the_field('section_six_wistia_id');?>'
            class='mywistia wistia_embed wistia_async_<?php the_field('section_six_wistia_id');?> popover=true popoverContent=html"'>
          </div><!-- mywistia -->
          <span class='my-play-button sec-six-play-button'>
            <span></span>
          </span><!-- play-button -->
          <span id='sec-six-play-title'><?php the_field('section_six_wistia_call_to_action');?></span>
          <!-- sec-six-play-title -->
        </div><!-- sec-six-play-inner -->
      </div><!-- sec-six-play-wrapper -->
      <picture>
        <?php $section_six_image = get_field('section_six_image');?>
        <?php if ($section_six_image) {?>
        <source media='(min-width: 768px)' srcset='<?php echo $section_six_image['url']; ?>'>
        <?php }?>
        <?php $section_six_image_mobile = get_field('section_six_image_mobile');?>
        <img id='sec-six-img' data-src="<?php echo $section_six_image_mobile['url']; ?>"
          alt="<?php echo $section_six_image_mobile['alt']; ?>" width='669' height='799' />
      </picture>
    </div><!-- sec-six-img-wrapper -->
    <div id='sec-six-content-wrapper'>
      <div id='sec-six-content' class='info-box'>
        <div id='sec-six-content-inner' class='info-box-inner'>
          <span id='six-info-title'><?php the_field('section_six_info_box_title');?></span><!-- six-info-title -->
          <div class='content'>
            <?php the_field('section_six_info_box_content');?>
          </div><!-- content -->
          <a class='button-two sec-six-button'
            href='<?php the_field('section_six_info_box_link');?>'><?php the_field('section_six_info_box_button_verbiage');?></a>
          <!-- button-two -->
        </div><!-- info-box-inner -->
      </div><!-- sec-six-content -->
    </div><!-- sec-six-content-wrapper -->
  </div><!-- sec-six-inner -->
</section><!-- section-six -->