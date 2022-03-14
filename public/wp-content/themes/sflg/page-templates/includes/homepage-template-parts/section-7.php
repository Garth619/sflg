<section id='section-seven'>
  <div id='sec-seven-inner'>
    <span id='sec-seven-title'><?php the_field('section_seven_title');?></span><!-- sec-seven-title -->
    <a class='button-two sec-seven-button'
      href='<?php the_field('section_seven_button_link');?>'><?php the_field('section_seven_button_verbiage');?></a>
    <!-- button-two sec-seven-button -->
    <div class='infoslider-component full-width-three-slides-component'>
      <div class='info-arrow info-arrow-left full-width-three-slides-left'>
        <img class='lazyload' data-src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='Arrow Image'
          width='15' height='30' loading='lazy' />
      </div><!-- info-arrow-left -->
      <div class='infoslider-slides-wrapper'>
        <div class='infoslider-slides full-width-three-slides'>
          <?php $section_seven_latest_news_and_blog_new = get_field('section_seven_latest_news_and_blog_new');?>
          <?php if ($section_seven_latest_news_and_blog_new): ?>
          <?php foreach ($section_seven_latest_news_and_blog_new as $post): ?>
          <?php setup_postdata($post);?>
          <div class='infoslider-single-slide'>
            <div class='infoslider-single-slide-inner'>
              <div class='info-slider-blog-title-wrapper'>
                <a class='info-slider-blog-title' href='<?php the_permalink();?>'><?php the_title();?></a>
                <!-- info-slider-blog-title -->
              </div><!-- info-slider-blog-title-wrapper -->
              <div class='dots-wrapper'>
                <span></span>
                <span></span>
                <span></span>
              </div><!-- dots-wrapper -->
              <div class='post-meta infoslide-post-meta'>
                <span class='post-category'>
                  Posted In
                  <?php echo get_the_category_list(); ?></span>
                <span class='post-date'> On <?php $pfx_date = get_the_date();
echo $pfx_date;?></span>
                <!-- post-date -->
              </div><!-- post-meta -->
              <span class='infoslider-slide-descrip'><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></span>
              <!-- infoslider-slide-descrip -->
              <a class='button-two sec-seven-read-more' href='<?php the_permalink();?>'>Read More</a>
              <!-- button-two sec-seven-read-more -->
            </div><!-- infoslider-single-slide-inner -->
          </div><!-- infoslider-single-slide -->
          <?php endforeach;?>
          <?php wp_reset_postdata();?>
          <?php endif;?>
        </div><!-- infoslider-slides -->
      </div><!-- infoslider-slides-wrapper -->
      <div class='info-arrow info-arrow-right full-width-three-slides-right'>
        <img class='lazyload' data-src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='Arrow Image'
          width='15' height='30' loading='lazy' />
      </div><!-- info-arrow-right -->
    </div><!-- infoslider-component -->
  </div><!-- sec-seven-inner -->
</section><!-- section-seven -->