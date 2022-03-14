<footer>
  <img id='footer-wave' class='lazyload' data-src='<?php bloginfo('template_directory');?>/images/form-wavetwo.svg'
    alt='Wave Image' width='1920' height='214' loading='lazy' />
  <div id='consultation'>
    <div id='consultation-inner'>
      <span id='footer-form-subtitle'><?php the_field('footer_form_subtitle', 'option');?></span>
      <!-- footer-form-title -->
      <span id='footer-form-title'><?php the_field('footer_form_title', 'option');?></span><!-- footer-form-title -->
      <div class='dots-wrapper'>
        <span></span>
        <span></span>
        <span></span>
      </div><!-- dots-wrapper -->
      <div id='footer-form-description'>
        <?php the_field('footer_form_description', 'option');?>
      </div><!-- form-description -->
      <?php gravity_form(1, false, false, false, '', true, 1233);?>
    </div><!-- form-wrapper -->
  </div><!-- consultation -->
  <?php if (!is_page_template('page-templates/template-contact.php')) {?>
  <div id='footer-contact'>
    <div id='contact-inner'>
      <?php get_template_part('page-templates/includes/template', 'contact_info');?>
    </div><!-- contact-inner -->
  </div><!-- footer-contact -->
  <?php }?>
  <div id='copyright'>
    <div id='copyright-inner'>
      <ul>
        <li>&copy; <?php echo date('Y'); ?> by <?php the_field('firm_name', 'option');?>
          <?php the_field('all_rights_reserved', 'option');?></li>
        <?php if (have_rows('footer_links', 'option')): ?>
        <?php while (have_rows('footer_links', 'option')): the_row();?>
        <li><a href=' <?php the_sub_field('page_link');?>'><?php the_sub_field('title');?></a></li>
        <?php endwhile;?>
        <?php endif;?>
      </ul>
      <div id='copyright-meta'>
        <?php if (get_field('child_support_calculator_link', 'option')) {?>
        <a class='calc' href='<?php the_field('child_support_calculator_link', 'option');?>' target="_blank"
          rel="noopener">
          <?php echo file_get_contents(get_template_directory() . '/images/calc.svg'); ?>
          <span><?php the_field('child_support_button_verbiage', 'option');?></span>
        </a><!-- calc -->
        <?php }?>
        <a id='ilawyer' href='//ilawyermarketing.com' target="_blank" rel="noopener">
          <img width="300" height="21" class='lazyload'
            data-src='<?php bloginfo('template_directory');?>/images/ilawyer.svg' alt='Wave Image' loading='lazy' />
        </a><!-- ilawyer -->
      </div><!-- copyright-meta -->
    </div><!-- copyright-inner -->
  </div><!-- copyright -->
</footer>
<?php wp_footer();?>
<?php the_field('footer_scripts', 'option');?>
</body>

</html>