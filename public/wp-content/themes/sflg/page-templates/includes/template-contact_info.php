<div class='contact-col'>
  <div class='contact-col-inner'>
    <span class='contact-title'><?php the_field('firm_name', 'option');?></span><!-- contact-title -->
    <span id='address'><?php the_field('address_new', 'option');?></span><!-- address -->
    <a id='directions' href="<?php the_field('google_map_link_new', 'option');?>" target="_blank"
      rel="noopener">Directions</a><!-- directions -->
  </div><!-- contact-col-inner -->
</div><!-- contact-col -->
<div class='contact-col'>
  <div class='contact-col-inner'>
    <span class='contact-title'><?php the_field('contact_title', 'option');?></span><!-- contact-title -->
    <span id='contact-subtitle'><?php the_field('contact_call_to_action', 'option');?></span>
    <!-- contact-subtitle -->
    <a id='contact-phone'
      href='tel:+1<?php echo str_replace(['-', '(', ')', ' ', '.'], '', get_field('phone_new', 'option')); ?>'><?php the_field('phone_new', 'option');?></a>
    <!-- contact-phone -->
  </div><!-- contact-col-inner -->
</div><!-- contact-col -->
<div class='contact-col'>
  <div class='contact-col-inner'>
    <span class='contact-title'><?php the_field('pay_title', 'option');?></span><!-- contact-title -->
    <a href='<?php the_field('pay_image_link', 'option');?>' target='_blank' rel='noopener'>
      <?php $pay_image = get_field('pay_image', 'option');?>
      <img id='lawpay' class="lazyload" data-src="<?php echo $pay_image['url']; ?>"
        alt="<?php echo $pay_image['alt']; ?>" width='146' height='65' loading="lazy" />
    </a>
  </div><!-- contact-col-inner -->
</div><!-- contact-col -->