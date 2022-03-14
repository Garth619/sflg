<a class='calc internal-calc' href='<?php the_field('child_support_calculator_link', 'option');?>' target="_blank"
  rel="noopener">
  <?php echo file_get_contents(get_template_directory() . '/images/calc.svg'); ?>
  <span><?php the_field('child_support_button_verbiage', 'option');?></span>
</a><!-- calc -->