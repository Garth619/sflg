<?php if (have_rows('faqs_gutenberg')): ?>
<div class='sflg-faqs-wrapper'>
  <?php while (have_rows('faqs_gutenberg')): the_row();?>
  <div class='sflg-faqs'>
    <h2><?php the_sub_field('question_sflg');?></h2>
    <?php the_sub_field('answer_sflg');?>
  </div>
  <?php endwhile;?>
</div>
<?php endif;?>